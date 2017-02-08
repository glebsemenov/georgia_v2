<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
	public function show( $id )
	{
		$hotel = Hotel::find( $id );

		return view( 'property.hotel', compact( 'hotel' ) );
	}
}