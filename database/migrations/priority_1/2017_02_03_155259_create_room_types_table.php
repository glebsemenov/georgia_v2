<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{
	public function up()
	{
		Schema::create( 'room_types', function( Blueprint $table )
		{
			$table->increments( 'id' );

			$table->string( 'title_ru', 32 );
			$table->string( 'title_en', 32 );
		} );
	}

	public function down()
	{
		Schema::dropIfExists( 'room_types' );
	}
}
