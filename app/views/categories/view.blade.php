@extends('layouts.default')

@section('content')
<?php 
//print_r($categories[1]->name);
//exit;
$selCat = Category::find($catid);
$mainCat = Category::find($selCat->parent_id);
//print_r();
?>
<div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="content listPanel">
		<div class="leftPanel">
        	
        	<div class="searchBox">
				<label>Search by Keywords</label>
                <div class="leftSearch">
                	<input type="text" name="txtSearch" value="" placeholder="E.g. mobile, car, sofa..." />
                    <button class="btn btn-sm btn-primary" type="button">Go</button>       
                </div>
                <div class="refineCats">
                	<div class="allCat"><a href="{{ URL::route('category','all') }}">All Categories</a></div>
                    <div class="normalCat"><strong><?php echo $mainCat->name;?></strong> <small>68,619 Ads</small></div>
                    <div class="selCat"><strong><?php echo $selCat->name;?></strong> <small>48,619 Ads</small></div>                    
                </div>
                <div class="refineAttrib">
                	<div class="attrib">
                    	<strong>Price</strong>
                    	<input type="text" value=""> - <input type="text" value=""><button class="btn btn-sm btn-primary" type="button">Go</button> 
                    </div>
                	<div class="attrib">
                    	<strong>Price</strong>
                    	<input type="text" value="1992"> - <input type="text" value="Max"><button class="btn btn-sm btn-primary" type="button">Go</button> 
                    </div>
                	<!--<div class="attrib">
                    	<strong>Mileage</strong>
                    	<select name="">
                        	<option>Less than 3000</option>
                        	<option>Less than 5000</option>                            
                        	<option>Less than 7000</option>                            
                        </select>
                    </div>
                	<div class="attrib engine">
                    	<strong>Engine Type</strong>
						<div><input type="checkbox" value=""> Petrol</div>
						<div><input type="checkbox" value=""> CNG</div>
						<div><input type="checkbox" value=""> Deisel</div>
						<div><input type="checkbox" value=""> Hybird</div>                                                                         
                    </div>-->                    
                	<div class="attrib seller">
                    	<strong>Condition</strong>
						<div><input type="checkbox" value=""> Used</div>
						<div><input type="checkbox" value=""> New</div>                         
                    </div>
                	<div class="attrib seller">
                    	<strong>Seller Type</strong>
						<div><input type="checkbox" value=""> individuals</div>
						<div><input type="checkbox" value=""> Bussiness / Company</div>                         
                    </div>                                        
                </div>                
            </div>                                                           

        </div>
		<div class="midPanel">
        	
        	<div class="postList">
            	<div></div>
                <div>
                	<ul>
                    	<?php
						foreach($posters as $poster){
							$file = MediaResource::find($poster->id);
						?>
                    	<li>
                        	<div class="snap">
                            	<?php
								if(!empty($file) && $file['upload_file']!=''){
								?>
                            	<img src="http://local.myproject/uploads/poster/<?php echo $file['upload_file'];?>" height="145" width="145" />
                                <?php 
								}else{
								?>
                                <img src="http://local.myproject/images/noimage.jpg" height="145" width="145" />
                                <?php
								}
								?>
                            </div>
                            <div class="post-detail">
                            	<h2><a href="#"><?php echo $poster->title;?></a><span class="price"><?php echo $poster->price;?></span></h2>
                                <div class="location"><?php echo $poster->city;?> | <?php echo $poster->catname;?></div>
                                <?php 
								if($poster->name=='car'){
								?>
                                	<div><strong>1986 150,000 km Manual CNG</strong></div>
                                <?php 
								}
								?>
                                <p>
                                	<?php
									if(strlen($poster->detail) > 180){
									  echo substr($poster->detail,0,180).' ...';
                                    }else{
									   echo $poster->detail;	
									}
                                    ?>
                                </p>
                                <small>Last updated: 29 minutes ago</small>
                            </div>
                        </li>
                        <?php
						}
						?>
                                              
                    </ul>
                </div>        
            </div>                                                           

        </div>        
        <div class="rightPanel"></div>
      </div>      

    </div>

@stop