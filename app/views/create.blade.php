@extends('master')

@section('title')
	Enter information for a new task
@endsection

@section('styles')
	{{ HTML::style("assets/css/task.css") }}
	{{ HTML::style("assets/css/hint.min.css") }}	
@endsection

@section('container')
	<div class="mainDiv">
		<center><h3>Enter Details for the New Task</h3></center>
		<form method="POST" action="save" id="details">
	    <table class="fullStretch">
		    	<tr><td>Task Title <span class="hint--top" data-hint="Title should be maximum 32 characters">[?]</span></td><td>:</td><td>{{ Form::text('tasktitle',null,array('class' => 'form-control','id' => 'tasktitle','placeholder' => 'Enter task title')) }}</td></tr>
		    	<tr><td>Task Description <span class="hint--top" data-hint="Description should be maximum 512 characters">[?]</span></td><td>:</td><td>{{ Form::textarea('taskdescription',null,array('class' => 'form-control','id' => 'tasktitle','placeholder' => 'Enter task description','rows' => '7','maxlength' => '512')) }}</td></tr>
		    	<tr><td>Task Deadline <span class="hint--top" data-hint="All values should be in 2-digit format">[?]</span></td><td>:</td><td>
		    	{{ Form::text('text', Date('d'), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Day','id' => 'deadlineDay','maxlength' => '2')) }}
		    	{{ Form::text('text', Date('m'), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Month','id' => 'deadlineMonth','maxlength' => '2')) }}
		    	{{ Form::text('text', Date('y'), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Year','id' => 'deadlineYear','maxlength' => '2')) }}<br/>
		    	{{ Form::text('text', Date('h'), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Hour','id' => 'deadlineHour','maxlength' => '2')) }}
		    	{{ Form::text('text', Date('i'), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Minute','id' => 'deadlineMinute')) }}
		    	<input type="button" class="btn btn-info btn-xs" style="margin-left:6px;margin-top:2px;" onClick="isValidDateAndTime()" value="Set Deadline Date and Time">
		    	<input type="hidden" name="hiddenDateAndTime" value="" id="hiddenField0">
		    	<span id="selectedTS"style="font-size:60%;padding:7px;">{{ Date('d-m-y h:i') }}</span>		    
		    	</td></tr>
		    	<tr><td>Priority</td><td>:</td><td>
		    	<select name="priority">
		    	  <option value="Low">Low</option>
				  <option value="Normal">Normal</option>
				  <option value="High">High</option>
				</select>
				</td>
				</tr>
		    </table>		
		<center>
		<div id="buttonsDiv">{{ Form::button('Save Task',array('class' => 'btn btn-info','onclick' => 'submitForm()')) }}&nbsp;		
		{{ HTML::link('dashboard','Cancel Editing',array('class' => 'btn btn-danger')) }}
		</div>
		</form>
		</center>
	</div>	
@endsection

@section('script')
	$('#tasktitle').focus();
	$("select").selectpicker({style: 'btn-sm btn-inverse', menuStyle: 'dropdown-inverse'});
	$('.dropdown-menu').eq(0).css('min-width','220px');
	$('.dropdown-arrow').eq(0).remove();	
@endsection
