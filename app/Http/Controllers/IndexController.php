<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

define( 'BEST_OFFER_NUMBER', 10 );

class IndexController extends Controller
{
	public function index()
	{
		$hotels = Hotel::all();
		$sql = 'select * from hotels order by (rating_hotel+rating_restaurant+rating_service+rating_cost_service+rating_location+rating_breakfast+rating_comfort+rating_room_avg)/8 limit 10';
		$count = count( $hotels );

		$config = [
			'applicationName'      => 'Welcome to Georgia',
			'bestOfferSlidesCount' => $count
		];

		return view( 'index', array(
			'config' => $config,
			'hotels' => $hotels
		) );
	}

	public static function calculateDelay( int & $counter )
	{
		return number_format( ( ( $counter++ % 3 ) / 2 ), 0, '.', '' );
	}
}
