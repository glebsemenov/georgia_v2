<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

define( 'BEST_OFFER_NUMBER', 10 );

class IndexController extends Controller
{
	public function index()
	{
		$hotels = Hotel::all();
		$count = count( $hotels );

		$config = [
			'applicationName'      => 'Welcome to Georgia',
			'bestOfferSlidesCount' => ( ( $count > BEST_OFFER_NUMBER) ? BEST_OFFER_NUMBER : $count )
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
