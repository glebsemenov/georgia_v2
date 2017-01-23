<?php

namespace App\Http\Controllers;

use App\Foundation\Hotel\HotelHandler;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function index()
	{
		$config = [
			'appName' => 'test name'
		];

		$hotelHandler = new HotelHandler();
		$hotels = $hotelHandler->get();

		return view( 'index', compact( 'config', 'hotels' ) );
	}
}
