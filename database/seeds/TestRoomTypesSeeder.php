<?php

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class TestRoomTypesSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 10; ++$i)
		{
			$roomtype = new RoomType();
			$roomtype->title_ru = 'Тип комнаты ' . $i;
			$roomtype->title_en = 'Room type ' . $i;
			$roomtype->save();
		}
	}
}
