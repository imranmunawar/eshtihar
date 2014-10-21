<?php

class PosterOption extends Eloquent {
	
	protected $table = 'poster_options';
	protected $fillable = array('category_id','field_option_id','field_option_val');	

}


