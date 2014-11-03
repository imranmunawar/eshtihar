@extends('layouts.default')

@section('content')
<?php 
//print_r($categories[1]->name);
//exit;
$categories = Category::where('parent_id','=', 0)->get();
$selCat = Category::find($catid);
//print_r($selCat);
//die;
?>
<div class="container">
      <div class="row">
        <div>
          <div class="row listBox">
            <div class="col-md-3 col-md-offset-1">
              <div class="theform login-form settings">

                {{ Form::open(array('url' => 'search/result','files'=>true,'id'=>'leftSearch')) }}
                {{ Form::hidden('catid',$catid,array('id'=>'catid')) }}
                                               
                <h2 class="content-heading">Refine</h2>
                <ul class="ac-settings">
                  <li>
					<div class="form-section-right">
                      <label>Keyword</label>
                      {{ Form::text('search_keyword',(isset($search_keyword))?$search_keyword:'',array('id' => 'search_keyword','placeholder' => 'I am looking for...')) }}
                    </div>
                  </li>
                </ul>
                <h2 class="content-heading">Price</h2>
                <ul class="ac-settings">
                  <li>
					<div class="form-section-right">
                      {{ Form::text('search_price1','',array('id' => 'search_price1','placeholder' => 'MIN')) }} - 
                      {{ Form::text('search_price2','',array('id' => 'search_price2','placeholder' => 'MAX')) }}
                    </div>
                  </li>
                </ul>                
                <?php
				if($catid==2)
				{
					$fields = CategoryField::where('category_id','=', $catid)->get();
					foreach($fields as $k => $field){
						if($field->field_type=='text'){
						?>                
						<h2 class="content-heading"><?php echo $field->field_label?></h2>
                        <ul class="ac-settings">
                          <li>
                            <div class="form-section-right">
                              {{ Form::text('option'.$field->id,'',array('class'=>'required')) }}
                            </div>
                          </li>
                        </ul> 
                      	<?php
						}
						if($field->field_type=='list'){
							 $arr = json_decode($field->field_value); 
						?>    
                            <h2 class="content-heading">Model</h2>
                            <ul class="ac-settings">
                              <li>
                                <div class="form-section-right">
                                  <select name="option<?php echo $field->id;?>">
                                    <?php
									foreach($arr as $opt){ 
									?>
									<option value="<?php echo $opt;?>"><?php echo $opt;?></option>
									<?php 
									}
									?>
                                  </select>
                                </div>
                              </li>
                            </ul> 
					<?php
						}
					}
				}
				?>
                
                
				<ul class="ac-settings">
                  <li>
					<div class="form-section-right">
                      <div class="btns-left leftmrl left-manu">
                       <input type="submit" value="Apply" class="signin-btn">
                       <button type="button" class="btn-gray">Cancel</button>
                     </div>
                    </div>
                  </li>
                </ul>                
                
                <h2 class="content-heading">Browse</h2>
                <ul id="demo1" class="nav ac-settings">
                  <?php 
				  foreach($categories as $category){
					  $act = '';
					  $secondHTML = '';
					  
					  $secondLevel = Category::where('parent_id','=', $category->id)->get();
					  $secondHTML = '<ul>';
					  foreach($secondLevel as $subCat){
						  $actCls = '';
						  if($subCat->id == $catid){
							 $actCls = 'selected';
						  }
						  $secondHTML .= '<li class="'.$actCls.'"><a href="javascript:void(0);" onclick="searchResult(\''.$subCat->id.'\');">'.$subCat->category.'</a></li>';
					  }
					  $secondHTML .= '</ul>';					  
					  
					  if($category->id == $selCat->parent_id){						  
						  $act = 'open active';
					  }
				  ?>
                  <li class="<?php echo $act;?>">
                  	<a href="#"><?php echo $category->category;?></a>
                    <?php echo $secondHTML;?>
                  </li>                  
                  <?php
				  }
				  ?>
                </ul>
                <p class="external">
                    <a href="#" id="collapseAll">Collapse All</a> | <a href="#" id="expandAll">Expand All</a>
                </p>                
                                          
                
                {{ Form::close() }}
                                
              </div>
            </div>


            <div class="col-md-7">
              <div class="signup-form">
                    <?php
					if(count($posters) > 0){
						foreach($posters as $poster)
						{
							$resources = MediaResource::where('poster_id','=', $poster->id)->take(1)->get();
							$category = Category::where('id','=', $catid)->take(1)->get();
							$city = City::where('id','=', $poster->city_id)->take(1)->get();
							$cls = '';
							if($poster->featured == 1){$cls = 'featured';}
						?>
						<div class="col-md-4 box-type-2 <?php echo $cls;?>">
						   <div class="imgbox">
						  <a href="#"><img src="{{ URL::to('/'); }}/uploads/poster/<?php echo $resources[0]->upload;?>"></a>
						  </div>
						  <div class="box-2-disc">
							<h2 class="box-2-title">
							<a href="{{ URL::route('poster-detail',$poster->id) }}">
								<?php if(strlen($poster->title) <= 20){echo $poster->title;}else{echo substr($poster->title,0,20).'...';}?>
							</a>
							</h2>
							<div class="status-bar">
							<p><span><?php echo $city[0]->city_name;?> | <?php echo $category[0]->category;?></span></p>
							</div>                        
							<p><?php if(strlen($poster->detail) <= 80){echo $poster->detail;}else{echo substr($poster->detail,0,80).'...';}?></p>
							<p><strong><?php echo GeneralPurpose::timeAgo($poster->created_at);?></strong></p>
							<a href="{{ URL::route('poster-detail',$poster->id) }}">More</a>
						  </div>
						</div>
						<div class="cb"></div>
						<?php
						}
					}else{
					?>
                    	<div class="col-md-4 box-type-2" style="text-align:center; font-weight:bold;">
							Sorry no record found!
						</div>
						<div class="cb"></div>                        
					<?php
                    }
					?>                                                                                                                                          
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
@stop