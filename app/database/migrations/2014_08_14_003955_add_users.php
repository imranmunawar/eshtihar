<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(array(
			'fname'=>'imran',
			'lname'=>'khan',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')									
		));
		DB::table('users')->insert(array(
			'fname'=>'Ahmad',
			'lname'=>'khan',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')									
		));		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('users')->where('fname','=','imran')->delete();
		DB::table('users')->where('fname','=','Ahmad')->delete();		
	}

}
