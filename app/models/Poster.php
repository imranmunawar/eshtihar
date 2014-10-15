<?php

class Poster extends Eloquent {
	
	protected $table = 'posters';
	protected $fillable = array('category_id','title','detail', 'price','seller_name','seller_email','seller_phone', 'state_id', 'city_id', 'adtype','seller_type');	

}


