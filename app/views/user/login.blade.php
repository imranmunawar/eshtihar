@extends('layouts.default')

@section('content')
<div class="container list-poster">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-5">
              <div class="theform login-form loginForm">
                <h2 class="content-heading">Please Login</h2>
                {{ Form::open(array('url' => 'login','files'=>true,'id'=>'postLogin')) }}
                  <div class="form-section">
                    <label class="control-label form-section-left">Email Address:</label>
                    <div class="form-section-right">
                      {{ Form::text('email','',array('id' => 'email')) }}
                    </div>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">Password</label>
                    <div class="form-section-right">
                      {{ Form::password('password','',array('id' => 'password')) }}
                    </div>
                  </div>
                 <div class="form-section">
                    <div class="form-section-right leftmr">
                          <strong>Do you have a eshtihar password?</strong>                    
                      <div class="radio">
                        <label class="mt8 mr20">
                          {{ Form::radio('user_type','2', true, array('class'=>'realradio')) }}
                          <div class="visvradio"></div> <div class="radiotitle">No, I am new to eshtihar.com</div>
                        </label>
                        <label class="mt8">
                          {{ Form::radio('user_type','1', true, array('class'=>'realradio')) }}
                          <div class="visvradio"></div> <div class="radiotitle">Yes, my password is:</div>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-section">
                    <div class="form-section-right leftmr">
                      {{Form::submit('Continue', ['class' => 'signin-btn'])}}
                    </div>
                  </div>
                  
                  <div class="form-section mb25">
                    <div class="form-section-right leftmr">
                      <div class="checkbox">
                        <p class="green-msg"><a href="#">Forgot Password?</a></p>
                      </div>
                    </div>
                  </div>
      			 {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop            