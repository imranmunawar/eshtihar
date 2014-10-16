<?php
foreach($fields as $k => $field){
?>
<div class="form-section">
    <label class="control-label form-section-left"><?php echo $field->field_label?><span class="impred">*</span></label>
    
      <?php 
	  if($field->field_type=='text'){
	  ?>
      <div class="form-section-right">
      {{ Form::text('option'.$field->id) }}
      </div>
      <?php
      }elseif($field->field_type=='list'){
	   $arr = json_decode($field->field_value) ; 
	   ?>
       <div class="form-section-right selectinside location">
       	  <select>
          	<?php
			foreach($arr as $opt){ 
			?>
            <option><?php echo $opt;?></option>
            <?php 
			}
			?>
          </select>
		 {{-- Form::select('option'.$field->id, $field->field_value, isset('option'.$field->id]) ? 'option'.$field->id: '',array('id'=>'option'.$field->id)) --}}
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