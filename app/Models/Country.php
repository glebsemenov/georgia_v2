<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	public $timestamps = FALSE;

	public function cities(  )
	{
		return $this->hasMany( 'App\Models\City' );
	}
}
