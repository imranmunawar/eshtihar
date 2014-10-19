@extends('layouts.default')

@section('content')
<?php 
//print_r($categories[1]->name);
//exit;
$categories = Category::where('parent_id','=', 0)->get();
$selCat = Category::find($catid);
//print_r($posters[0]->title);
//die;
?>
<div class="container">
      <div class="row">
        <div>
          <div class="row listBox">
            <div class="col-md-3 col-md-offset-1">
              <div class="theform login-form settings">
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
						  $secondHTML .= '<li class="'.$actCls.'"><a href="'.URL::route('category',$subCat->id).'">'.$subCat->category.'</a></li>';
					  }
					  $secondHTML .= '</ul>';					  
					  
					  if($category->id == $selCat->parent_id){						  
						  $act = 'active';
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
                      {{ Form::text('search_price',(isset($search_price))?$search_price:'',array('id' => 'search_price','placeholder' => 'PKR...')) }}
                    </div>
                  </li>
                </ul>
                <?php
				/*if($catid==2)
				{
					$fields = CategoryField::where('category_id','=', $catid)->get();
					foreach($fields as $k => $field){
                ?>                
                
                <h2 class="content-heading">Make</h2>
                <ul class="ac-settings">
                  <li>
					<div class="form-section-right">
                      <select><option>Make</option></select>
                    </div>
                  </li>
                </ul>     
                <h2 class="content-heading">Model</h2>
                <ul class="ac-settings">
                  <li>
					<div class="form-section-right">
                      <select><option>Model</option></select>
                    </div>
                  </li>
                </ul> 
                
                <?php
					}
				}*/
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
                
                {{ Form::close() }}
                                
              </div>
            </div>


            <div class="col-md-7">
              <div class="signup-form">
                    <?php
					if(count($posters) > 0){
						foreach($posters as $poster)
						{
							$cls = '';
							//if($poster->featured == 1){$cls = 'featured';}
						?>
						<div class="col-md-4 box-type-2 <?php echo $cls;?>">
						   <div class="imgbox">
						  <a href="#"><img src="{{ URL::to('/'); }}/uploads/poster/3d7dce1c37ba00e4d7d4e344f2e0b2bb-1413154578-imagtewtes.jpg"></a>
						  </div>
						  <div class="box-2-disc">
							<h2 class="box-2-title">
							<a href="#">
								<?php if(strlen($poster->title) <= 50){echo $poster->title;}else{echo substr($poster->title,0,50).'...';}?>
							</a>
							</h2>
							<div class="status-bar">
							<p><span>Lahore | Car</span></p>
							</div>                        
							<p><?php if(strlen($poster->detail) <= 80){echo $poster->detail;}else{echo substr($poster->detail,0,80).'...';}?></p>
							<p><strong><?php echo GeneralPurpose::timeAgo($poster->created_at);?></strong></p>
							<a href="#">More</a>
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