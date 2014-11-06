<?php
//$url = 'http://api.hostip.info/?ip='.$_SERVER['REMOTE_ADDR'];
//echo $url;
?>
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::to('/'); }}">
        <img src="{{ URL::to('/'); }}/img/logo.png">
        <!--<span><strong>eshtihar</strong>.com</span>
        <p>Pakistan's first growing online classified</p>-->
      </a>
    </div>
    <div class="header-cocialbox">
      <ul>
        <li><a href="" class="fb"></a></li>
        <li><a href="" class="tw"></a></li>
        <li><a href="" class="gp"></a></li>
        <li><a href="" class="email"></a></li>
      </ul>
    </div>
    <div class="navbar-collapse collapse">
      <!--<ul class="nav navbar-nav nav-left">
        <li><a href="#">Find Projects</a></li>
        <li><a href="#about">Karma Shop</a></li>
      </ul>-->
      
		<ul class="nav navbar-nav navbar-right nav-right loggedin">
            @if(Auth::check())
            <li class="h-notifications">
              <ul>
                <li><a class="h-msgsg" href="#"></a><span>2</span></li>
              </ul>
            </li>
            <li class="user-name-drowpd dropdown">
               <a data-toggle="dropdown" class="dropdown-toggle" href="#">
               	{{ Auth::user()->fname.' '.Auth::user()->lname }} 
               </a>
               <ul role="menu" class="dropdown-menu">
                <li><a href="#">My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#">Manage my ads</a></li>
                <li class="divider"></li>
                <li><a href="{{ URL::route('logout') }}">Logout</a></li>
              </ul> 
            </li>
            <li><a href="{{ URL::route('createad') }}" class="header-post-button">+ Submit an ad</a></li>
			@else
            <li><a href="{{ URL::route('login') }}"  style="text-transform: none" class="myaccount">Login</a></li>
            <li><a href="{{ URL::route('createad') }}" class="header-post-button">+ Submit an ad</a></li>
           @endif            
          </ul>      

    </div><!--/.nav-collapse -->
  </div>
</div>
