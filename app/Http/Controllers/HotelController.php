<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class HotelController extends Controller
{
	public function show( $id )
	{
		$hotel = Hotel::find( $id );
		$lowestPrice = PropertyController::getLowestPrice( $id );
		$rooms = Room::where( 'hotel_id', $hotel->id )->get();

		$photos = array( $hotel->photo );

		foreach( $rooms as $room )
			if( ! empty( $room->photos ) )
				$photos[] = $room->photos->pluck( 'photo' )->toArray();

		$it = new RecursiveIteratorIterator( new RecursiveArrayIterator( $photos ) );
		$photos = iterator_to_array( $it, FALSE );

		return view( 'property.hotel', compact( 'hotel', 'lowestPrice', 'photos', 'rooms' ) );
	}
}