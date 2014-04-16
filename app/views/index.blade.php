@extends('master')

@section('title')
	Home
@endsection

@section('container')
	   <div class="login" style="background:none !important;padding:38px 38px 27px">
        <div class="login-screen" style="background:none !important">
          <div class="login-icon">
            <img src="assets/images/icons/png/Watches.png" alt="Welcome to Mail App" />
            <h4>Welcome to <small>To-Dos</small></h4>
          </div>

          {{ Form::open(array('url' => 'validate','class' => 'login-form')) }}
            <div class="form-group">       
              {{ Form::text('email',null,array('class' => 'form-control login-field','id' => 'login-email','placeholder' => 'Enter your e-mail ID')) }}
              <label class="login-field-icon fui-user" for="login-email"></label>              
            </div>

            <div class="form-group">             
              {{ Form::password('password',array('class' => 'form-control login-field','placeholder' => 'Password','id' => 'login-pass')) }}
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>
            @if(Session::has('errorCode'))
              @if(Session::get('errorCode')==1)                
                 <center><h5 style="font-size:initial;color:#f50">You must be logged in to view this page</h5></center>
              @elseif(Session::get('errorCode')==2)
                 <center><h5 style="font-size:initial;color:#f50">The account with the E-Mail ID <u>{{ Session::get('email') }}</u> already exists.</h5></center>                
              @elseif(Session::get('errorCode')==3)
                 <center><h5 style="font-size:initial;color:#f50">Invalid E-Mail ID or password</h5></center>
              @elseif(Session::get('errorCode')==4)
                 <center><h5 style="font-size:initial;color:#090">You have successfully logged out.</h5></center>
              @endif
            @endif
            {{ HTML::link('#','Log In',array('class' => 'btn btn-primary btn-lg btn-block','onclick' => 'document.forms[0].submit()')) }}
            {{ HTML::link('new','New here ? Register',array('class' => 'login-link')) }}
          {{ Form::close() }}
        </div>
      </div>
@endsection

@section('script')
  $('#login-email').focus();
@endsection


