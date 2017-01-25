<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWarnsTable extends Migration
{
	public function up()
	{
		Schema::create( 'user_warns', function( Blueprint $table )
		{
			$table->increments( 'id' );

			$table->text( 'description' );

			$table->timestamp('date');

			$table->integer( 'by_user_id' )->unsigned();
			$table->foreign( 'by_user_id' )->references( 'id' )->on( 'user_types' );

			$table->integer( 'to_user_id' )->unsigned();
			$table->foreign( 'to_user_id' )->references( 'id' )->on( 'user_types' );
		} );
	}

	public function down()
	{
		Schema::dropIfExists( 'user_warns' );
	}
}
