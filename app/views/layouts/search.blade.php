<?php
$cities = City::where('state_id','=', 2)->get();
$categories = Category::where('parent_id','=', 0)->get();
?>
<div class="container-fluid searchArea">
  <div class="container">
    <div class="row">
     {{ Form::open(array('url' => 'search/result','files'=>true,'id'=>'leftSearch')) }}
      <ul>
        <li>
        	<select name="location" id="location">
            	<option value="">Select location...</option>
				<?php 
				foreach($cities as $city){
					$selected = '';
					if(isset($location) && $city->id == $location){$selected = 'selected';}					
				?>
            	<option value="<?php echo $city->id;?>" <?php echo $selected;?>><?php echo $city->city_name;?></option>
                <?php
				}
				?>
            </select>
        </li>
        <li>
        	<select name="catid" id="catid">
            	<option value="">Select category...</option>
            	<?php 
				foreach($categories as $category){
					$selected = '';
					if(isset($parentId) && $category->id == $parentId){$selected = 'selected';}
				?>
            	<option value="<?php echo $category->id;?>" <?php echo $selected;?>><?php echo $category->category;?></option>
                <?php
				}
				?>
            </select>
        </li>
        <li>{{ Form::text('search_keyword',(isset($search_keyword))?$search_keyword:'',array('id' => 'search_keyword','placeholder' => 'I am looking for...')) }}</li>
        <li><input type="submit" value="Search"></li>
      </ul>
      {{ Form::close() }}
    </div>
  </div>      
</div>