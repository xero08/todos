<?php
	class UserController extends BaseController{	

		public static function getTasks(){
			return Task::where('user_id','=',User::where('email','=',Session::get('email'))->first()->id)->get()->sortBy('deadline');
		}	

		public function createAccount(){		
			$success = true;
			$count = User::where('email','=',Input::get('email'))->count();
			if($count==1)
				return Redirect::to('/')->with(array('errorCode' => 2,'email' => Input::get('email')));
			if($success){
				$user = new User;
				$user->email = Input::get('email');
				$user->password = Input::get('password');
				$user->save();
				Session::put('email',Input::get('email'));
				return Redirect::to('welcome');
			}
		}

		public function dashboard(){			
			$email = Input::get('email');
			$password = Input::get('password');
			Session::put('email',$email);
			if(User::where('email','=',$email)->where('password','=',$password)->count()==0){
				Session::remove('email');
				return Redirect::to('/')->with(array('errorCode' => 3));
			}
			else{				
				$tasks = $this::getTasks();								
				Session::set('email',$email);
				Session::set('tasks',$tasks);
				return Redirect::to('dashboard');
			}
		}

		public function viewTask($id){
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			$task = Task::find($id); 			
			return View::make('task')->with(array('task' => $task,'id' => $id));
		}

		public function editTask($id){
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			$task = Task::find($id);
			if(strtotime($task->deadline)<strtotime("now")||$task->complete==1)
				return Redirect::to('task/'.$id);
			return View::make('edit')->with(array('task' => $task,'id' => $id));
		}

		public function newTask(){
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			return View::make('create');
		}

		public function createTask(){
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			$task = new Task;
			$task->user_id = User::where('email','=',Session::get('email'))->first()->id;
			$task->title = Input::get('tasktitle');
			$task->description = Input::get('taskdescription');
			$task->deadline = Input::get('hiddenDateAndTime');
			$task->priority = Input::get('priority');
			$task->save();
			$taskID = $task->id;
			return Redirect::to('task/'.$taskID);
		}

		public function saveTask($id){			
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			//return Input::get('hiddenDateAndTime');
			Task::where('id','=',$id)->update(array('title' => Input::get('tasktitle'),'description' => Input::get('taskdescription'),'priority' => Input::get('priority'),'deadline' => Input::get('hiddenDateAndTime')));
			$task = Task::find($id); 
			return Redirect::to('task/'.$id)->with(array('task' => $task,'id' => $id));
		}

		public function deleteTask($id){
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			$task = Task::find($id);
			$task->delete();
			return Redirect::to('dashboard');
		}

		public function completeTask($id){
			if(!Session::has('email'))
				return Redirect::to('/')->with(array('errorCode' => 1));
			Task::where('id','=',$id)->update(array('complete' => 1));
			return Redirect::to('task/'.$id);
		}

		public function logout(){
			Auth::logout();
			Session::remove('email');
			return Redirect::to('/')->with(array('errorCode' => 4));
		}
	}
?>