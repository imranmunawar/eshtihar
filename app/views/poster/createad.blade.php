@extends('layouts.default')

@section('content')

<div class="container">
 		@if($errors->has())
        <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif
	  {{ Form::open(array('url' => 'poster/createad','files'=>true,'id'=>'postmyad')) }}
      <div class="row">
        <div>
          <div class="row">
            <div class="col-md-7 full-form">

			<div class="signup-form">
                <h2 class="content-heading">Select Categories</h2>               
                  <div class="form-section">
                  		<div class="cols-box">
                            <ul>
                            	<?php 
								foreach($mainCategories as $cat):
								?>
								<li id="first-level-<?php echo $cat->id;?>" onclick="loadSecondLevel('<?php echo $cat->id;?>');">
									<?php echo $cat->category;?>
								</li>
								<?php
								endforeach;
								?>
                            </ul>
                        </div>
                  		<div class="cols-box">
                    	<ul id="second-level">
                        	
                        </ul>
                        </div>
                  		<div class="cols-box">
                    	<ul id="third-level">
                        	
                        </ul>
                        </div>
                  		<div class="cols-box">
                    	<ul id="four-level">
                        	
                        </ul>
                        </div>                                                                        
                  </div>
                  <div class="cb"></div>
              </div>
              
              
<!--			  <div class="signup-form">
                <h2 class="content-heading">Ad Detail</h2>
                 
				 <div class="form-section">
                    <label class="control-label form-section-left">Title<span class="impred">*</span></label>
                    <div class="form-section-right">
                      <iframe width="400" height="240" scrolling="no" src="http://excise-punjab.gov.pk/SearchVehicle.aspx" style="height: 500px; border: 0px none; width: 800px; margin-top: -350px; margin-left: -90px;"></iframe>
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>					 

                                    
                  <div class="cb"></div>
              </div>-->              
              
              
			  <div class="signup-form">
                <h2 class="content-heading">Ad Detail</h2>
                 
					<div class="form-section">
                    <label class="control-label form-section-left">Title<span class="impred">*</span></label>
                    <div class="form-section-right">
                      {{ Form::text('ad_title') }}
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div> 
				  <div class="form-section">
                    <label class="control-label form-section-left">Price<span class="impred">*</span></label>
                    <div class="form-section-right">
                      {{ Form::text('ad_price') }}
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
                  
				  <div class="form-section" id="load-attributes">

                  </div>                  
                                                     
                   <div class="form-section">
                    <label class="control-label form-section-left">Description <span class="impred">*</span></label>
                    <div class="form-section-right add-section">
                      {{ Form::textarea('ad_text', null, ['size'=>'30x5']) }}
                    </div>
                    <div class="cb"></div>
                  </div>
				  <div class="form-section h26">
                    <label class="control-label form-section-left">Ad Type<span class="impred">*</span></label>
                    <div class="form-section-right">
                      <div class="radio">
                        <label class="mr20">
                          {{ Form::radio('ad_type','used', true, array('class'=>'realradio')) }}
                          <div class="visvradio"></div> <div class="radiotitle">Used</div>
                        </label>
                        <label class="">
                          {{ Form::radio('ad_type','new', false, array('class'=>'realradio')) }}
                          <div class="visvradio"></div> <div class="radiotitle">New</div>
                        </label>
                      </div>
                    </div>
                  </div>
                                    
                  <div class="cb"></div>
              </div>
              
			  
			  <div class="signup-form location-box">
                <h2 class="content-heading">Upload images</h2>                  
                  
                  <div class="form-section">
                    <!--<label class="control-label form-section-left">&nbsp;</label>-->
                    <div class="form-section-right selectinside upload-img">
                    	{{ Form::button('Upload Images',array('id' => 'add_more','class' =>'btn btn-success upload')) }}
                   		<ul>

                        </ul> 
                    </div>
                  </div>
               </div>              
              
              
              <div class="signup-form location-box">
                <h2 class="content-heading">Location</h2>                  
                  
                  <div class="form-section">
                    <label class="control-label form-section-left">State <span class="impred">*</span></label>
                    
                    <div class="form-section-right selectinside location">
						{{-- Form::select('states', $states, '') --}}
						{{ Form::select('states', $states, isset($states['id']) ? $states['id']: '',array('id'=>'ad-state')) }}                            
                    </div>
                  </div>
				  <div class="form-section" id="load-cities">
                    <label class="control-label form-section-left">City <span class="impred">*</span></label>
                    
                    <div class="form-section-right selectinside location">
							{{ Form::select('cities', $cities,'',array('id' => 'city')) }}
                    </div>
                  </div>                  
               </div> 
                                           
              
                            
            <div class="cb"></div>
              <div class="signup-form">
                <h2 class="content-heading">Personal Information</h2>
                  
                  <div class="form-section">
                    <label class="control-label form-section-left">Name<span class="impred">*</span></label>
                    <div class="form-section-right">
                      {{ Form::text('ad_uname') }}
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
				  <div class="form-section">
                    <label class="control-label form-section-left">Email<span class="impred">*</span></label>
                    <div class="form-section-right">
                      {{ Form::text('ad_uemail') }}
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>
				  <div class="form-section">
                    <label class="control-label form-section-left">Phone<span class="impred">*</span></label>
                    <div class="form-section-right">
                      {{ Form::text('ad_uphone') }}
                    </div>
                    <div class="form-section-third">
                    </div>
                  </div>  
                  
				  <div class="form-section h26">
                    <label class="control-label form-section-left">Select<span class="impred">*</span></label>
                    <div class="form-section-right">
                      <div class="radio">
                        <label class="mr20">
                          <input type="radio" name="typeselector" class="realradio">
                          {{ Form::radio('user_type','0', true, array('class'=>'realradio')) }}
                          <div class="visvradio"></div> <div class="radiotitle">Individual</div>
                        </label>
                        <label class="">
                          {{ Form::radio('user_type','1', false, array('class'=>'realradio')) }}
                          <div class="visvradio"></div> <div class="radiotitle">Dealer</div>
                        </label>
                      </div>
                    </div>
                  </div>                                                    

                  <div class="form-section">
                    <div class="btns-left leftmrl">
                       {{Form::submit('Publish', ['class' => 'signin-btn'])}}
                       {{Form::button('Cancel', ['class' => 'btn-gray'])}}
                     </div>
                  </div>
              </div>
            </div>

            {{ Form::hidden('firstlevel','',array('id'=>'firstlevel')) }}
            {{ Form::hidden('secondlevel','',array('id'=>'secondlevel')) }}
            {{ Form::hidden('thirdlevel','',array('id'=>'thirdlevel')) }} 
            {{ Form::hidden('fourlevel','',array('id'=>'fourlevel')) }}
            {{ Form::hidden('num-image','',array('id'=>'num-image')) }}                                

          </div>
        </div>
      </div>
      {{ Form::close() }}
    </div>

@stop