<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function orders()
	{
		$orders = BookRequest::all();

		$keys = array();

		if( ! empty( $orders ) )
			$keys = array_keys( $orders->toArray()[ 0 ] );

		return view( 'orders', compact( 'orders', 'keys' ) );
	}
}
