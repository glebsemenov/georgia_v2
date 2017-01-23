<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'hotels', function( Blueprint $table )
		{
			$table->increments( 'id' );

			$table->string( 'name', 32 );
			$table->tinyInteger( 'stars' );
			$table->string( 'address', 32 );
			$table->string( 'website', 32 );
			$table->string( 'email', 32 );
			$table->integer( 'rating_hotel' )->default( 0 );
			$table->integer( 'rating_restaurant' )->default( 0 );
			$table->integer( 'rating_service' )->default( 0 );
			$table->integer( 'rating_cost_service' )->default( 0 );
			$table->integer( 'rating_location' )->default( 0 );
			$table->integer( 'rating_breakfast' )->default( 0 );
			$table->integer( 'rating_comfort' )->default( 0 );
			$table->integer( 'rating_room_avg' )->default( 0 ); // average room rating
			$table->text( 'description' )->nullable();
			$table->string( 'languages' )->nullable();

			$table->time( 'check_in' )->nullable();
			$table->time( 'check_out' )->nullable();

			$table->date( 'opened_in' )->nullable();
			$table->tinyInteger( 'number_of_rooms' )->nullable();
			$table->tinyInteger( 'number_of_floors' )->nullable();

			$table->boolean( 'wifi' )->default( FALSE );
			$table->boolean( 'parking' )->default( FALSE );
			$table->boolean( 'restaurant' )->default( FALSE );
			$table->boolean( 'swimming_pool' )->default( FALSE );
			$table->boolean( 'bar' )->default( FALSE );
			$table->boolean( 'gym' )->default( FALSE );
			$table->boolean( 'laundry' )->default( FALSE ); // прачечная
			$table->boolean( 'pets_allowed' )->default( FALSE );

			$table->integer( 'city_id' )->unsigned();
			$table->foreign( 'city_id' )->references( 'id' )->on( 'cities' );

			$table->integer( 'owner_id' )->unsigned();
			$table->foreign( 'owner_id' )->references( 'id' )->on( 'users' );

			$table->integer( 'property_type_id' )->unsigned();
			$table->foreign( 'property_type_id' )->references( 'id' )->on( 'property_types' );

			$table->tinyInteger( 'warns' )->default( 0 );
			$table->timestamp( 'banned_till' )->nullable();
			$table->timestamps();
		} );
	}

	public function down()
	{
		Schema::dropIfExists( 'hotels' );
	}
}
