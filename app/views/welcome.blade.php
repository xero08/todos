@extends('master')

@section('title')
	Congratulations!
@endsection

@section('styles')
	{{ HTML::style("assets/css/welcome.css") }}
@endsection

@section('container')
	<div class="welcomeMessage">Congratulations! You have successfully registered for an account at To-Dos.<br/>To-Dos is 
	a site where you can create a prioritized list of tasks</div>
	<div class="instructions">
		<h3>Instructions</h3>
		<ul>
			<li>To create a new task,click the <button class="btn btn-embossed btn-info">Add new Task</button> button on the dashbaord</li>
			<li>You need to specify a <b>short title</b> for the task,a <b>small description</b>,the <b>deadline</b>,<b>priority</b> for the task you create.</li>
			<li>A task may be deleted at any time or marked complete by you.</li>
		</ul>
		<br/>
		<br/>
		<hr/>
		<center>
			<h4>Good Luck!</h4>
			<button class="btn btn-hg btn-primary" onclick="window.location='dashboard'">Proceed</button>
		</center>		
	</div>
@endsection