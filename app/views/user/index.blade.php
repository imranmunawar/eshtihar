@extends('layouts.default')

@section('content')
<?php
//echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=203.128.16.37')));
?>

<div class="container dashboard">
  <div class="row">
    <div class="col-md-7 user-credentials">
      <div class="prof-user">
        <img src="img/sarah-doe.jpg">
        <div class="user-info">
          <h2>Sarah Doe</h2>
          <div class="user-age">32 years old</div>
          <div class="user-address">Berlin, Germany</div>
          <div class="about-user">
            <p>Having most adventure time of my life by working on the project named “the wave for children</p>
            <a href="#"></a>
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="col-md-3 user-popularity">
      <div class="popular-projects">
        <div class="PP-head"><p>Projects</p></div>
        <div class="PP-owned"><p><a href="#"><span>24</span>Owned</a></p></div>
        <div class="PP-owned"><p><a href="#"><span>24</span>Participaid</a></p></div>
        <div class="cb"></div>
      </div>
      <div class="no-of-follows">
        <div class="PP-owned"><p><a href="#"><span>73</span>Followers</a></p></div>
        <div class="PP-owned"><p><a href="#"><span>124</span>Karma Points</a></p></div>
        <div class="cb"></div>
      </div>
      
    </div>
  </div>
</div>
<div class="container-fluid user-tabs-full dashboard-tabs">
    <div class="row">
    <div class="container">
      <div class="row">
        <ul class="user-tabs">
          <li class="active"><a href="{{ URL::route('user-index') }}">Manage my ads</a></li>
          <!--<li><a href="#">Messages</a></li>-->
          <li><a href="{{ URL::route('user-account') }}">My details</a></li>
        </ul>
      </div>
    </div>
    </div>
</div>


<div class="container main-content profileprojects dashboard-myads">
      <div class="row">
        <div class="col-md-12">
          <h2 class="content-heading">Hi imran, you currently have 3 adverts<!--<a href="#">Project statement</a><a href="#">Add a new project</a>--></h2>
        <div class="row type-2">
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <p>These children need hope and need you to support them</p>
                <div class="status-bar">
                <p><span>Lahore | Cars</span> | <strong>PKR 1,90,000</strong></p>
                </div>
                <a href="#">Promote</a> |
                <a href="#">Statistics</a> |
                <a href="#">Edit</a> |
                <a href="#">Delete</a> |
                Last posted: just now | Views: 0 | Ad ID: 1087614771


              </div>
          </div>
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <p>These children need hope and need you to support them</p>
                <div class="status-bar">
                <p><span>Lahore | Cars</span> | <strong>PKR 1,90,000</strong></p>
                </div>
                <a href="#">Promote</a> |
                <a href="#">Statistics</a> |
                <a href="#">Edit</a> |
                <a href="#">Delete</a> |
                Last posted: just now | Views: 0 | Ad ID: 1087614771


              </div>
          </div>
		  <div class="col-md-4 box-type-2">
              <a href="#"><img src="img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <p>These children need hope and need you to support them</p>
                <div class="status-bar">
                <p><span>Lahore | Cars</span> | <strong>PKR 1,90,000</strong></p>
                </div>
                <a href="#">Promote</a> |
                <a href="#">Statistics</a> |
                <a href="#">Edit</a> |
                <a href="#">Delete</a> |
                Last posted: just now | Views: 0 | Ad ID: 1087614771


              </div>
          </div>
		  <div class="col-md-4 box-type-2">
              <a href="#"><img src="img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <p>These children need hope and need you to support them</p>
                <div class="status-bar">
                <p><span>Lahore | Cars</span> | <strong>PKR 1,90,000</strong></p>
                </div>
                <a href="#">Promote</a> |
                <a href="#">Statistics</a> |
                <a href="#">Edit</a> |
                <a href="#">Delete</a> |
                Last posted: just now | Views: 0 | Ad ID: 1087614771


              </div>
          </div>
		  <div class="col-md-4 box-type-2">
              <a href="#"><img src="img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <p>These children need hope and need you to support them</p>
                <div class="status-bar">
                <p><span>Lahore | Cars</span> | <strong>PKR 1,90,000</strong></p>
                </div>
                <a href="#">Promote</a> |
                <a href="#">Statistics</a> |
                <a href="#">Edit</a> |
                <a href="#">Delete</a> |
                Last posted: just now | Views: 0 | Ad ID: 1087614771


              </div>
          </div>
		  <div class="col-md-4 box-type-2">
              <a href="#"><img src="img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <p>These children need hope and need you to support them</p>
                <div class="status-bar">
                <p><span>Lahore | Cars</span> | <strong>PKR 1,90,000</strong></p>
                </div>
                <a href="#">Promote</a> |
                <a href="#">Statistics</a> |
                <a href="#">Edit</a> |
                <a href="#">Delete</a> |
                Last posted: just now | Views: 0 | Ad ID: 1087614771


              </div>
          </div>

               
        </div>
      </div>
    </div>
 </div>

@stop