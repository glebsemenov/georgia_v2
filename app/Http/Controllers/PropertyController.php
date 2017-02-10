<?php namespace App\Http\Controllers;

use App\Models\RoomType;
use DB;
use Auth;
use App\Models\City;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Foundation\Property\PropertyHandler;

class PropertyController extends Controller
{
	public function index( Request $request )
	{
		$hotels = array();

		if( ! empty( $request->input() ) )
		{
			$input = $request->input();
			$propertyTypes = $this->getPropertyTypes( $input );
			$stars = $this->getStars( $input );
			$price = $this->getPriceRange( $input );
			$rating = $this->getRating( $input );
			$rooms = $this->getRooms( $input );
			$adults = $this->getAdults( $input );
			$children = $this->getChildren( $input );

			$markers = array_fill( 0, count( $propertyTypes ), '?' );
			$markers = implode( ',', $markers );

			$sql = 'SELECT *
					FROM hotels AS `h`
					WHERE `property_type_id` IN (' . $markers . ')
					AND stars >= ?
					AND EXISTS(SELECT price FROM rooms WHERE hotel_id = h.id AND price BETWEEN ? AND ?)
					AND ((rating_hotel+rating_restaurant+rating_service+rating_cost_service+rating_location+rating_breakfast+rating_comfort+rating_room_avg)/8) >= ?
					AND EXISTS(SELECT number_of_rooms FROM rooms WHERE hotel_id = h.id AND number_of_rooms >= ?)';

			$params = $propertyTypes;
			$params[] = $stars;
			$params[] = $price[ 'low' ];
			$params[] = $price[ 'high' ];
			$params[] = $rating;
			$params[] = $rooms;

			$hotels = DB::select( $sql, $params );
		}

		$propertyTypes = PropertyType::all();

		return view( 'property', compact( 'hotels', 'propertyTypes' ) );
	}

	private function getPropertyTypes( array & $request )
	{
		$ids = array();

		foreach( $request as $key => $value )
			if( strpos( $key, 'prop' ) !== FALSE )
			{
				$ids[] = substr( $key, 4 );
				unset( $request[ $key ] );
			}

		return $ids;
	}

	private function getStars( array & $request ) : string
	{
		$star = 1;

		foreach( $request as $key => $value )
			if( strpos( $key, 'star' ) !== FALSE )
			{
				$star = substr( $key, 4 );
				unset( $request[ $key ] );
			}

		return $star;
	}

	private function getPriceRange( array & $request ) : array
	{
		$price = array(
			'low'  => 0,
			'high' => 500
		);

		if( isset( $request[ 'pointsFrom' ] ) )
		{
			$price[ 'low' ] = $request[ 'pointsFrom' ];
			unset( $request[ 'pointsFrom' ] );
		}

		if( isset( $request[ 'pointsTo' ] ) )
		{
			$price[ 'high' ] = $request[ 'pointsTo' ];
			unset( $request[ 'pointsTo' ] );
		}

		if( $price[ 'low' ] > $price[ 'high' ] )
		{
			$temp = $price[ 'low' ];
			$price[ 'low' ] = $price[ 'high' ];
			$price[ 'high' ] = $temp;
		}

		return $price;
	}

	private function getRating( array & $request )
	{
		$rating = $request[ 'rating' ];

		unset( $request[ 'rating' ] );

		return $rating;
	}

	private function getRooms( array & $request )
	{
		$rooms = $request[ 'rooms' ];

		unset( $request[ 'rooms' ] );

		return $rooms;
	}

	private function getAdults( array & $request )
	{
		$adults = $request[ 'adults' ];

		unset( $request[ 'adults' ] );

		return $adults;
	}

	private function getChildren( array & $request )
	{
		$children = $request[ 'children' ];

		unset( $request[ 'children' ] );

		return $children;
	}

	public static function getAverageRating( $hotel )
	{
		return round( ( $hotel->rating_hotel + $hotel->rating_restaurant + $hotel->rating_service + $hotel->rating_cost_service +
				$hotel->rating_location + $hotel->rating_breakfast + $hotel->rating_comfort + $hotel->rating_room_avg ) / 8, 1 );
	}

	public static function getLowestPrice( int $hotelID )
	{
		$sql = 'SELECT MIN(price) AS `price` FROM rooms WHERE hotel_id = ?';
		$params = array( $hotelID );

		return DB::select( $sql, $params )[ 0 ]->price;
	}

	public function showRegisterForm()
	{
		if( self::isUserHasProperty( Auth::user()->id ) )
			return redirect('/');

		$propertyTypes = PropertyType::all();
		$cities = City::all();

		return view( 'property.register', compact( 'cities', 'propertyTypes' ) );
	}

	public function register( Request $request )
	{
		if( self::isUserHasProperty( Auth::user()->id ) )
			return redirect('/');

		$handler = new PropertyHandler( 'hotel' );

		return $handler->getInstance()->build( $request )
			? redirect()->back()->with( 'success', [ 'Отель был успешно создан. Внимание! Добавьте комнаты, чтобы он отображался в поиске!' ] )
			: redirect()->back()->with( 'failure', [ 'Ошибка. Что-то пошло не так...' ] );
	}

	public static function isUserHasProperty( int $userID )
	{
		$sql = 'SELECT id FROM `hotels` WHERE owner_id = ?';
		$params = array( $userID );

		return ! empty( DB::select( $sql, $params ) );
	}

	public static function getUserProperty( int $userID )
	{
		$sql = 'SELECT id FROM `hotels` WHERE owner_id = ?';
		$params = array( $userID );

		$result = DB::select( $sql, $params );
		return ! empty( $result ) ? $result[0]->id : -1;
	}

	public function manage()
	{

	}

	public function showAddRoomForm( int $id )
	{
		$roomTypes = RoomType::all();

		return view( 'property.add_room', compact( 'id', 'roomTypes' ) );
	}

	public function addRoom( Request $request )
	{
		$handler = new PropertyHandler( 'hotel' );

		return $handler->getInstance()->addRoom( $request )
			? redirect()->back()->with( 'success', [ 'Комната была успешно создана.' ] )
			: redirect()->back()->with( 'failure', [ 'Ошибка. Что-то пошло не так...' ] );
	}
}