@extends('master')

@section('title')
	Dashboard
@endsection

@section('styles')
	{{ HTML::style("assets/css/dashboard.css") }}	
@endsection

@section('container')
	<div class="mainDiv">
		<center><h3>Dashboard</h3></center>		
		@if(!Session::has('tasks'))
			Invalid Session
		@endif
		@if(sizeof(Session::get('tasks'))==0)
			<center><i>No tasks have been defined yet</i></center>
		@else
			<table class="tasksTable">
			<tr><td>Task UID</td><td>Task Title</td><td>Task Description</td><td>Deadline</td><td>Priority</td><td>Status</td><td>Action</td></tr>
			@foreach(Session::get('tasks') as $task)
				<tr><td>{{ $task->id }}</td><td><div class="truncate">{{ $task->title }}</div></td><td><div class="truncate">{{ $task->description }}</div></td><td>{{ date("d-M-Y H:i",strtotime($task->deadline)) }}</td>
				<td>{{ $task->priority }}</td>
				<td>{{ $task->complete==1?'Complete':(strtotime($task->deadline)<strtotime("now")?'Expired':'Pending') }}</td><td>{{ HTML::link('task/'.$task->id,'View Full Task',array('class' => 'btn btn-primary')) }}</td></tr>
			@endforeach
			</table>
		@endif
		<center>
		<div id="buttonsDiv">{{ HTML::link('create','Add new Task',array('class' => 'btn btn-info')) }}&nbsp;
		{{ HTML::link('logout','Logout',array('class' => 'btn btn-warning')) }}
		</div>
		</center>
	</div>
@endsection