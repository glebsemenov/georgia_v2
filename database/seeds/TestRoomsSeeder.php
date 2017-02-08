<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class TestRoomsSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 10; ++$i)
		{
			$hotel = new Room();
			$hotel->description_en = 'Description ' . $i;
			$hotel->description_ru = 'Описание ' . $i;
			$hotel->room_type_id = rand(1,10);
			$hotel->hotel_id = rand(2,10);
			$hotel->number_of_rooms = rand(1,4);
			$hotel->price = rand(0,500);
			$hotel->count = rand(1,10);
			$hotel->save();
		}
	}
}
