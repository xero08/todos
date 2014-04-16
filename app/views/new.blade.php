@extends('master')

@section('title')
	New Account Registration
@endsection

@section('container')
	   <div class="login" style="background:none !important;padding:38px 38px 27px">
        <div class="login-screen" style="background:none !important">
          <div class="login-icon">
            <img src="assets/images/icons/png/NewUser.png" alt="Welcome to Mail App" />
            <h4>Get Started</h4>
          </div>

          {{ Form::open(array('url' => 'create','class' => 'login-form')) }}
            <div class="form-group">       
              {{ Form::text('email',null,array('class' => 'form-control login-field','id' => 'register-email','placeholder' => 'Enter your e-mail ID')) }}
              <label class="login-field-icon fui-user" for="resgister-email"></label>              
            </div>

            <div class="form-group">             
              {{ Form::password('password',array('class' => 'form-control login-field','placeholder' => 'Password','id' => 'login-pass')) }}
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            {{ HTML::link('#','Create New Account',array('class' => 'btn btn-primary btn-lg btn-block','onclick' => 'document.forms[0].submit()')) }}
            {{ HTML::link('/','Already have an account ? Login here',array('class' => 'login-link')) }}
          {{ Form::close() }}
        </div>
      </div>
@endsection

@section('script')
  $('#register-email').focus();
@endsection
