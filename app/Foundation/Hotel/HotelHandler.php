<?php namespace App\Foundation\Hotel;

use App\Models\Hotel;

class HotelHandler
{
	public function get( int $id = NULL )
	{
		if( ! is_null( $id ) )
			return Hotel::find( $id );

		return Hotel::all();
	}
}