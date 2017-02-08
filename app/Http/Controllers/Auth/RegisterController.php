<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	use RegistersUsers;

//	protected $redirectTo = '/account'; # marker: auth redirect
	protected $redirectTo = '/';

	public function __construct()
	{
		$this->middleware( 'guest' );
	}

	protected function validator( array $data )
	{
		return Validator::make( $data, [
			'email'    => 'required|email|max:32|unique:users',
			'password' => 'required|min:6|max:15',
			'fname'    => 'required|min:3|max:32',
			'lname'    => 'required|min:3|max:32',
		] );
	}

	protected function create( array $data )
	{
		$user = new User();
		$user->fname = $data[ 'fname' ];
		$user->lname = $data[ 'lname' ];
		$user->birthday = Carbon::createFromDate( $data[ 'year' ], $data[ 'month' ], $data[ 'day' ], 'Europe/Kiev' );
		$user->email = $data[ 'email' ];
		$user->gender_id = $data[ 'gender_id' ];
		$user->user_type_id = $data[ 'user_type_id' ];
		$user->password = bcrypt( $data[ 'password' ] );
		$user->save();

		return $user;
	}
}