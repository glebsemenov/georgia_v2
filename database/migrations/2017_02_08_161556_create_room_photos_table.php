<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPhotosTable extends Migration
{
    public function up()
    {
	    Schema::create( 'room_photos', function( Blueprint $table )
	    {
		    $table->increments( 'id' );
		    $table->string( 'photo' );
		    $table->integer( 'room_id' )->unsigned();
		    $table->foreign( 'room_id' )->references( 'id' )->on( 'rooms' );
	    } );
    }

    public function down()
    {
	    Schema::dropIfExists( 'room_photos' );
    }
}
