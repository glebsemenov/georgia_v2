<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'book_requests', function( Blueprint $table )
		{
			$table->increments( 'id' );
			$table->string( 'email' );
			$table->date( 'date_from' );
			$table->date( 'date_to' );
			$table->tinyInteger( 'adults' );
			$table->tinyInteger( 'children' )->default(0);
			$table->text( 'comment' )->nullable;
			$table->integer( 'room_id' )->unsigned();
			$table->foreign( 'room_id' )->references( 'id' )->on( 'rooms' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( 'book_requests' );
	}
}
