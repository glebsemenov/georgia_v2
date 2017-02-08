<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
	public function up()
	{
		Schema::create( 'rooms', function( Blueprint $table )
		{
			$table->increments( 'id' );

			$table->decimal( 'price', 6 )->default( 1.00 );
			$table->integer( 'count' )->default( 0 );
			$table->tinyInteger( 'number_of_rooms' );
			$table->text( 'description_ru' )->nullable();
			$table->text( 'description_en' )->nullable();

			$table->integer( 'room_type_id' )->unsigned();
			$table->foreign( 'room_type_id' )->references( 'id' )->on( 'room_types' );

			$table->integer( 'hotel_id' )->unsigned();
			$table->foreign( 'hotel_id' )->references( 'id' )->on( 'hotels' );
		} );
	}

	public function down()
	{
		Schema::dropIfExists( 'rooms' );
	}
}
