@extends('master')

@section('title')
	Information for task with ID {{ $id }}
@endsection

@section('styles')
	{{ HTML::style("assets/css/task.css") }}	
@endsection

@section('container')
	<div class="mainDiv">
		<center><h3>Task Details</h3></center>		
		@if($task==NULL)
			<center style="margin-top:20%"><i>No task with the specified task ID exists :(</i></center>
			<center>{{ HTML::link('dashboard','Back to dashboard',array('class' => 'btn btn-inverse')) }}
		@else
		    <table class="fullStretch">
		    	<tr><td>Title</td><td>:</td><td>{{ $task->title }}</td></tr>
		    	<tr><td>Description</td><td>:</td><td>{{ $task->description }}</td></tr>
		    	<tr><td>Deadline</td><td>:</td><td>{{ $task->deadline }}</td></tr>
		    	<tr><td>Priority</td><td>:</td><td>{{ $task->priority }}</td></tr>
		    </table>		
			<center>
			<div id="buttonsDiv">
			@if(strtotime($task->deadline)<strtotime("now"))
				{{ '<h5><font color="red">The deadline for this task has expired</font></h5>' }}
			@elseif($task->complete==0)				
				{{ HTML::link('edit/'.$id,'Edit Task',array('class' => 'btn btn-info')) }}&nbsp;
				{{ HTML::link('complete/'.$id,'Mark task as complete',array('class' => 'btn btn-success')) }}&nbsp;
			@elseif($task->complete==1)
				{{ '<h5><font color="green">This task is complete</font></h5>' }}			
			@endif
			{{ HTML::link('delete/'.$id,'Delete Task',array('class' => 'btn btn-danger')) }}
			{{ HTML::link('dashboard','Back to dashboard',array('class' => 'btn btn-inverse')) }}
			</div>
			</center>
		@endif
	</div>	
@endsection