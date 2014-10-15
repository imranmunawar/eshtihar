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
        <span><strong>eshtihar</strong>.com</span>
        <p>Pakistan's first growing online classified</p>
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
      <ul class="nav navbar-nav navbar-right nav-right">
        <li><a href="login-registration.html"  style="text-transform: none">Log in</a></li>
        <li><a href="login-registration.html"  style="text-transform: none">Sign up</a></li>
        <li><a href="{{ URL::route('createad') }}" class="header-post-button">Post a ad</a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform: capitalize">Sign up <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
