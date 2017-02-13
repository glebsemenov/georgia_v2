<?php namespace App\Foundation\Property;

use App\Models\BookRequest;
use Auth;
use Validator;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;

class HotelHandler
{
	private $rules;

	public function __construct()
	{
		$this->rules = array(
			'email' => 'required|unique:hotels'
		);
	}

	public function build( Request $request )
	{
		$validator = Validator::make( $request->all(), $this->rules );

		if( $validator->fails() )
			return array(
				'success' => FALSE,
				'message' => $validator->getMessageBag()->first()
			);

		$hotel = new Hotel();

		$hotel->email = $request->input( 'email' );
		$hotel->city_id = $request->input( 'city' );
		$hotel->owner_id = Auth::user()->id;
		$hotel->address_ru = $request->input( 'address_ru' );
		$hotel->address_en = $request->input( 'address_en' );
		$hotel->stars = $request->input( 'stars' );
		$hotel->name_ru = $request->input( 'name_ru' );
		$hotel->name_en = $request->input( 'name_en' );
		$hotel->website = $request->input( 'url' );
		$hotel->languages = $request->input( 'languages' );
		$hotel->description_ru = $request->input( 'description_ru' );
		$hotel->description_en = $request->input( 'description_en' );
		$hotel->property_type_id = $request->input( 'propType' );
		$this->attachOptions( $request->input(), $hotel );

		$imageName = $hotel->name_en . '.' . $request->file( 'image' )->getClientOriginalExtension();
		$request->file( 'image' )->move( base_path() . '/public/img/hotels/', $imageName );
		$hotel->photo = '/img/hotels/' . $imageName;

		$result = array(
			'success' => $hotel->save(),
			'id'      => $hotel->id
		);

		return $result;
	}

	public function addRoom( Request $request )
	{
		$room = new Room();

		$room->price = $request->input( 'price' );
		$room->count = $request->input( 'count' );
		$room->number_of_rooms = $request->input( 'number_of_rooms' );
		$room->description_ru = $request->input( 'description_ru' );
		$room->description_en = $request->input( 'description_en' );
		$room->room_type_id = $request->input( 'room_type_id' );
		$room->hotel_id = $request->input( 'hotel_id' );
		$result = array(
			'success' => $room->save(),
			'id'      => $room->hotel_id
		);

		$files = $request->file( 'images' );
		foreach( $files as $file )
		{
			$destinationPath = base_path() . '/public/img/hotels/' . $request->input( 'hotel_id' ) . '/rooms/';
			$filename = $file->getClientOriginalName();
			$file->move( $destinationPath, $filename );

			$photo = new RoomPhoto();
			$photo->photo = '/img/hotels/' . $request->input( 'hotel_id' ) . '/rooms/' . $filename;
			$photo->room_id = $room->id;
			$photo->save();
		}

		return $result;
	}

	private function attachOptions( array $input, Hotel & $hotel )
	{
		$options = array( 'wifi', 'parking', 'restaurant', 'swimming_pool', 'bar', 'gym', 'laundry', 'pets_allowed' );

		$input = array_keys( $input );

		array_map( function( $key ) use ( $options, & $hotel )
		{
			if( in_array( $key, $options ) )
				$hotel->{$key} = 1;
		}, $input );
	}

	public function bookRoom( Request $request )
	{
		$bookRequest = new BookRequest();

		$bookRequest->email = $request->input( 'email' );
		$bookRequest->date_from = $request->input( 'date_from' );
		$bookRequest->date_to = $request->input( 'date_to' );
		$bookRequest->adults = $request->input( 'adults' );
		$bookRequest->children = $request->input( 'children' );
		$bookRequest->comment = $request->input( 'comment' );
		$bookRequest->room_id = $request->input( 'room_id' );

		$result = array(
			'success' => $bookRequest->save(),
			'id'      => $request->input( 'room_id' )
		);

		return $result;
	}
}