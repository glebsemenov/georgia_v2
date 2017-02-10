<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public $timestamps = FALSE;

	public function photos(  )
	{
		return $this->hasMany( 'App\Models\RoomPhoto' );
	}

	public function type(  )
	{
		return $this->belongsTo( 'App\Models\RoomType', 'id' );
	}
}
