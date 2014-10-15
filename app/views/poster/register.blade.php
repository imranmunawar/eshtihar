@extends('layouts.default')

@section('content')
<script>
function showCategories(cls,id){
	$('.subcats').hide();
	$('#cat-'+cls).show();
	$('#parentCategory').val(id);
}
function changeCategory(){
	$('.categories').show();	
}
function subCategories(pid,id,cls){
	$('#childCategory').val(id);
	switchCategorie(cls);	
}
function switchCategorie(cls){
	var pid = $('#parentCategory').val();
	var id  = $('#childCategory').val();
	var name = $('.categories ul li#parent-'+pid+' a').html();
	var cname = $('.categories ul li#child-'+id+' a').html();
	data = '<label class="choosen">Chosen Category:</label><div class="chosen-cats">';
	data += '<div class="main-cat"><b class="cat-'+cls+'"></b>'+name+'<span>'+cname+'</span></div>';
	data += '<div class="sub-cat" onclick="changeCategory();">Change Category</div></div>';
	$('#loadCategory').html(data);
	$('.categories').hide();	
}
switchCategorie(cls='');
</script>
<div class="content frmPanel">
		<div class="rightPanel">
        		{{ Form::open(array('url' => 'poster/index')) }}
                @if($errors->has())
					{{ $errors->first() }}
				@endif
               	<div class="poster">
                    <ul>
                        <li>
                           
                            <div class="topHeader">
                                <h2>Upload up to 6 photos</h2>
                            </div>
                        </li> 
                        <li>
                            <label>Images:</label>
                            <p>
                            We highly recommend that you upload one or more photos since this will increase your chances for your ad to be sold quickly!
                            </p>
                            <label></label>
                            <div class="txtInput"><button type="button" class="btn btn-success">Upload Images</button></div>
                        </li>                    
                        <li>
                            <div class="topHeader">
                                <h2>Details about your item</h2>
                            </div>
                        </li>
                        <div style="clear:both;"></div>
                        <li id="loadCategory">
 
                        </li>                                            
                        <li>
                            <!--<label>Select Category:</label>-->
                            <div class="categories">
                                <div class="cat-header"><h2>Select Category:</h2></div>
                                <div style="clear:both;"></div>                            
                            	<div class="list-cats">
                                	<ul>
                                    	<?php 
										foreach($mainCategories as $cat):
										?>
                                    	<li id="parent-<?php echo $cat->id;?>" onclick="showCategories('<?php echo $cat->css_class;?>','<?php echo $cat->id;?>');">
                                        	<span class="cat-<?php echo $cat->css_class;?>"></span>
                                            <a href="#"><?php echo $cat->name;?></a>
                                        </li>
                                        <?php
										endforeach;
										?>
                                    </ul>
                                </div>
                            	
								<?php 						
                                foreach($subCategories as $sub):
								
								//if($sub->parent_id!=$prev_id)
                                    echo '<div class="list-cats subcats" id="cat-'.$sub->css_class.'" style="display:none;"><ul>';
									foreach($sub['sub'] as $cat){
                                	?>                                
                                    
                                    <li onclick="subCategories('<?php echo $cat->parent_id;?>','<?php echo $cat->id;?>','<?php echo $sub->css_class;?>');" id="child-<?php echo $cat->id;?>">
                                        <a href="#"><?php echo $cat->name;?></a> 
                                    </li>
                        
                                	<?php
									}
                                //if($sub->parent_id!=$prev_id && $prev_id!=0){
                                echo '</ul></div>';					
                                //}
                                $prev_id = $sub->parent_id;

                                endforeach;
                                ?>                                    
                                
                            </div>
                            <!--<div><select name="txtTitle"><option>All Category</option></select></div>-->
                        </li>
                        <div style="clear:both;"></div>
                       
                        <li class="rdType">
                            <label>Type of ad:</label>
                            <div class="typeAd">
                            {{ Form::radio('ad_type','Sale', true, array('class'=>'forSale')) }} <span>For Sale </span>
                            {{ Form::radio('ad_type','Buy', false, array('class'=>'wantBuy')) }} <span>Want to Buy</span>

                            </div>
                        </li>
                        <div style="clear:both;"></div>
                        <li>
                            <label>Title:</label>
                            <div class="txtInput">{{ Form::text('ad_title') }}</div>
                        </li>
                        <li>
                            <label>Ad text:</label>
                            <div class="txtInput">
                            	{{ Form::textarea('ad_text', null, ['size'=>'30x5']) }}
                            </div>
                        </li>
                        <li>
                            <label>Price:</label>
                            <div class="txtInput">
                            	{{ Form::text('ad_price') }}
                            </div>
                        </li>
                                                                                                                     
                        <li>
                            <div class="topHeader">
                                <h2>Seller Information:</h2>
                            </div>
                        </li>                        
                        <li class="rdType">
                            <label>Are you:</label>
                            <div class="typeAd">
                            {{ Form::radio('user_type','individual', true, array('class'=>'forSale')) }} <span>An Individual</span>
                            {{ Form::radio('user_type','company', false, array('class'=>'wantBuy')) }} <span>A Company</span>                            
                            </div>
                        </li> 
                        <div style="clear:both;"></div>                       
                        <li>
                            <label>Name:</label>
                            <div class="txtInput">{{ Form::text('user_name') }}</div>
                        </li>                       
                        <li>
                            <label>E-mail:</label>
                            <div class="txtInput">{{ Form::email('user_email') }}</div>
                        </li>                        
                        <li>
                            <label>Phone:</label>
                            <div class="txtInput">{{ Form::text('user_number') }}</div>
                        </li>
                        <li>
                            <label>State:</label>
                            <div>
                               {{ Form::select('region',[
                                   ''=>'Choose Region',
                                   'Islamabad'=>'Islamabad',
                                   'Punjab'=>'Punjab',
                                   'Khyber Pakhtunkhwa'=>'Khyber Pakhtunkhwa',
                                   'Sindh'=>'Sindh',
                                   'Balochistan'=>'Balochistan',
                                   'FATA'=>'FATA',
                                   '2011'=>'Gilgit Baltistan',                                                                                                                                  	                                   ]) 
                                 }}
                            </div>
                        </li>
                        <li>
                            <label>City:</label>
                            <div>
                               {{ Form::select('region_city',[
                                   ''=>'Choose City',
                                   'Lahore'=>'Lahore',
                                   'Kasur'=>'Kasur',
                                   'Mureedke'=>'Mureedke',
                                                                                                                                 	                                   ]) 
                                 }}                            
                            	
                             </div>
                        </li>                                                
                        <li>
                        <label></label>
                        <div class="txtInput">
                        	<button type="button" class="btn btn-warning ad-post">Post</button>
                            {{ Form::submit() }}
                        </div>
                        </li>                                                                                                                                    
                    </ul>
                    {{ Form::hidden('parentCategory','',array('id'=>'parentCategory')) }}
                    {{ Form::hidden('childCategory','',array('id'=>'childCategory')) }}                                        
                </div>                                                           
        		{{ Form::close() }}
        </div>
        <div class="leftPanel"></div>
      </div>
@stop