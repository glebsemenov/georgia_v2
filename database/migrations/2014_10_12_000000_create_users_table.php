<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'users', function( Blueprint $table )
		{
			$table->increments( 'id' );
			$table->string( 'fname' );
			$table->string( 'lname' );
			$table->date( 'birthday' );
			$table->string( 'photo' )->default( '/img/default/no_profile_photo.jpg' );
			$table->string( 'email' )->unique();
			$table->string( 'password' );

			$table->integer( 'rating' )->default( 0 );

			$table->integer( 'gender_id' )->unsigned();
			$table->foreign( 'gender_id' )->references( 'id' )->on( 'genders' );

			$table->integer( 'user_type_id' )->unsigned();
			$table->foreign( 'user_type_id' )->references( 'id' )->on( 'user_types' );

			$table->rememberToken();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( 'users' );
	}
}
