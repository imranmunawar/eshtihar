<?php
foreach($fields as $k => $field){
?>
<div class="form-section">
    <label class="control-label form-section-left"><?php echo $field->field_label?><span class="impred">*</span></label>
    
      <?php 
	  if($field->field_type=='text'){
	  ?>
      <div class="form-section-right">
      {{ Form::text('option'.$field->id,'',array('class'=>'required')) }}
      </div>
      <?php
      }elseif($field->field_type=='list'){
	   $arr = json_decode($field->field_value) ; 
	   ?>
       <div class="form-section-right selectinside location">
       	  <select class="required" name="option<?php echo $field->id;?>">
          	<?php
			foreach($arr as $opt){ 
			?>
            <option value="<?php echo $opt;?>"><?php echo $opt;?></option>
            <?php 
			}
			?>
          </select>

      </div>
	  <?php
      }
	  ?>
    
    <div class="form-section-third">
    </div>
</div>
<?php
}
?>