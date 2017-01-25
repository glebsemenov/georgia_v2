<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public $timestamps = FALSE;

	public function country(  )
	{
		return $this->belongsTo( 'App\Models\Country' );
    }

	public function hotels(  )
	{
		return $this->hasMany( 'App\Models\Hotel' );
    }
}
