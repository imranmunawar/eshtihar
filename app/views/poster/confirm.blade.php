@extends('layouts.default')

@section('content')

<div id="confirmation">
	<div class="container project-mission-scor">
      <div class="row project-mission-points">
        <div class="points">
          <p>Thank you for posting your Ad!</p>
        </div>
      </div>
      <div class="row project-mission-text">
        <div class="col-md-12">
          <p>Thanks for posting your ad {{ $poster[0]->title }} (reference number {{ $poster[0]->id }}). It can sometimes take a few hours for your ad to appear in the listings however, you can view your ad here straight away.</p>
          <p>We will send a confirmation email to {{ $poster[0]->seller_email }} which you can use to edit or delete your ad in future.</p>
        </div>
      </div>      
    </div>
    <div class="cb"></div>
    <div id="confirm">
      <div class="form-section">
        <div class="btns-left leftmr">
           <a class="signin-btn viewad" href="{{ URL::route('poster-detail',$poster[0]->id) }}">View Ad</a>
         </div>
      </div> 
      <div class="form-section">
        <div class="btns-left leftmr">
           <a class="signin-btn submitad" href="{{ URL::route('createad') }}">+ Submit an ad</a>
           {{Form::button('Manage my ad', ['class' => 'btn-gray'])}}
         </div>
      </div>         
    </div>
</div>
@stop