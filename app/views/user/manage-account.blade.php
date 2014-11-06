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
          <li><a href="{{ URL::route('user-index') }}">Manage my ads</a></li>
          <!--<li><a href="#">Messages</a></li>-->
          <li class="active"><a href="{{ URL::route('user-account') }}">My details</a></li>
        </ul>
      </div>
    </div>
    </div>
</div>
<div class="container main-content profileprojects dashboard-myads">
            <div class="col-md-7">
              <div class="signup-form">
                <h2 class="content-heading">My account details</h2>
                
                <form role="form" class="form-horizontal account-preferences">
                  <div class="form-section">
                    <h4>Update Email Address</h4>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">First Name: <span class="impred">*</span></label>
                    <div class="form-section-right">
                      <input type="email" placeholder="">
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">Last Name: <span class="impred">*</span></label>
                    <div class="form-section-right">
                      <input type="email" placeholder="">
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">Phone Number: <span class="impred">*</span></label>
                    <div class="form-section-right">
                      <input type="email" placeholder="">
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  <div class="form-section">
                    <div class="btns-left leftmr">
                       <button class="signin-btn">Update</button>
                       <button class="btn-gray">Cancel</button>
                     </div>
                  </div>
                </form> 
                
				<div class="btspacer3"></div>
                <form role="form" class="form-horizontal account-preferences">
                  <div class="form-section">
                    <h4>Change Password</h4>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">Current Password <span class="impred">*</span></label>
                    <div class="form-section-right">
                      <input type="password" placeholder="">
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">New Password <span class="impred">*</span></label>
                    <div class="form-section-right">
                      <input type="password" placeholder="">
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  <div class="form-section">
                    <label class="control-label form-section-left">Repeat New <span class="impred">*</span></label>
                    <div class="form-section-right">
                      <input type="password" placeholder="">
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  <div class="form-section">
                    <div class="btns-left leftmr">
                       <button class="signin-btn">Update</button>
                       <button class="btn-gray">Cancel</button>
                     </div>
                  </div>
                </form>                
                
                               
                <div class="btspacer3"></div>                
                
                <form role="form" class="form-horizontal account-preferences">
                  <div class="form-section">
                    <h4>Email Notifications</h4>
                  </div>
                  <div class="form-section">
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" class="realchkbx"><div class="visvchkbx"></div> 
                          <div class="chkbxtitle">Yes, I want to receive newsletter</div>
                        </label>
                      </div>
					  <div class="checkbox">
                        <label>
                          <input type="checkbox" class="realchkbx"><div class="visvchkbx"></div> 
                          <div class="chkbxtitle">Yes, I want to receive e-mail notifications of messages</div>
                        </label>
                      </div>
					  <div class="checkbox">
                        <label>
                          <input type="checkbox" class="realchkbx"><div class="visvchkbx"></div> 
                          <div class="chkbxtitle">Yes, I want to receive e-mail alerts about new listings</div>
                        </label>
                      </div>                                            
                  </div>
                  <div class="form-section">
                    <div class="btns-left leftmr">
                       <button class="signin-btn">Save</button>
                     </div>
                  </div>
                </form>

                <div class="btspacer3"></div>
                <form role="form" class="form-horizontal account-preferences">
                  <div class="form-section">
                    <h4>Deactivate Account</h4>
                    <p>All your data on eshtihar.com will be deleted and you will not able to use it again.</p>
                  </div>
                  <div class="form-section">
                    <div class="btns-left leftmrl deactive">
                       <button class="signin-btn redbtn">Deactivate my account :(</button>
                     </div>
                  </div>
                </form>
              </div>
            </div>
</div>
<div class="cb"></div>
@stop