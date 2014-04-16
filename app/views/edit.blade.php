@extends('master')

@section('title')
	Edit details for task with ID {{ $id }}
@endsection

@section('styles')
	{{ HTML::style("assets/css/task.css") }}
	{{ HTML::style("assets/css/hint.min.css") }}
@endsection

@section('container')
	<div class="mainDiv">
		<center><h3>Task Details</h3></center>			
		@if($task==NULL)
			<center style="margin-top:20%"><i>No task with the specified task ID exists :(</i></center>
			<center>{{ HTML::link('dashboard','Back to dashboard',array('class' => 'btn btn-inverse')) }}
		@else
			<form method="POST" action="../save/{{ $id }}" id="details">
		    <table class="fullStretch">
		    	<tr><td>Title <span class="hint--top" data-hint="Title should be maximum 32 characters">[?]</span></td><td>:</td><td>{{ Form::text('tasktitle',$task->title,array('class' => 'form-control','id' => 'tasktitle','placeholder' => 'Enter task title')) }}</td></tr>
		    	<tr><td>Description <span class="hint--top" data-hint="Description should be maximum 512 characters">[?]</span></td><td>:</td><td>{{ Form::textarea('taskdescription',$task->description,array('class' => 'form-control','id' => 'tasktitle','placeholder' => 'Enter task description','rows' => '7','maxlength' => '512')) }}</td></tr>
		    	<tr><td>Deadline <span class="hint--top" data-hint="All values should be in 2-digit format">[?]</span></td><td>:</td><td>
		    	{{ Form::text('text', date("d",strtotime($task->deadline)), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Day','id' => 'deadlineDay','maxlength' => '2')) }}
		    	{{ Form::text('text', date("m",strtotime($task->deadline)), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Month','id' => 'deadlineMonth','maxlength' => '2')) }}
		    	{{ Form::text('text', date("y",strtotime($task->deadline)), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Year','id' => 'deadlineYear','maxlength' => '2')) }}<br/>
		    	{{ Form::text('text', date("H",strtotime($task->deadline)), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Hour','id' => 'deadlineHour','maxlength' => '2')) }}
		    	{{ Form::text('text', date("i",strtotime($task->deadline)), array('class' => 'form-control customSize input-sm', 'placeholder' => 'Minute','id' => 'deadlineMinute')) }}
		    	<input type="button" class="btn btn-info btn-xs" style="margin-left:6px;margin-top:2px;" onClick="isValidDateAndTime()" value="Set Deadline Date and Time">
		    	<input type="hidden" name="hiddenDateAndTime" value="{{ date("d-m-y H:i",strtotime($task->deadline)) }}" id="hiddenField0">
		    	<span id="selectedTS"style="font-size:60%;padding:7px;">{{ date("d-m-y H:i",strtotime($task->deadline)) }}</span>		    		    	
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
			{{ HTML::link('task/'.$id,'Cancel',array('class' => 'btn btn-danger')) }}
			</div>
			</form>
			</center>
		@endif
	</div>	
@endsection

@section('script')
	$('#tasktitle').focus();	
	$("select").selectpicker({style: 'btn-sm btn-inverse', menuStyle: 'dropdown-inverse'});
	$('.dropdown-menu').eq(0).css('min-width','220px');
	$('.dropdown-arrow').eq(0).remove();
	//$('select').find('option').eq(2).attr('selected','selected')
	$('.dropdown-menu').eq(0).find('li').eq(0).removeClass('selected');
	@if($task->priority=='Low')
		{{ "$('.dropdown-menu').eq(0).find('li').eq(0).addClass('selected');" }}
	@elseif($task->priority=='Normal')
		{{ "$('.dropdown-menu').eq(0).find('li').eq(1).addClass('selected');" }}
	@else
		{{ "$('.dropdown-menu').eq(0).find('li').eq(2).addClass('selected');" }}
	@endif	
@endsection