<?php namespace App\Foundation\Property;

use Auth;
use Validator;
use App\Models\Hotel;
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
			return redirect()->back()->withErrors( $validator )->withInput();

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

		return $hotel->save();
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
}