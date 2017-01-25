<?php

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class TestHotelsSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 10; ++$i)
		{
			$hotel = new Hotel();
			$hotel->property_type_id = 1;
			$hotel->owner_id = 1;
			$hotel->city_id = 1;
			$hotel->description_en = 'Description ' . $i;
			$hotel->description_ru = 'Описание ' . $i;
			$hotel->email = 'e@ma.il ' . $i;
			$hotel->website = 'web.site ' . $i;
			$hotel->address_en = 'Address ' . $i;
			$hotel->address_ru = 'Адрес ' . $i;
			$hotel->stars = rand(1, 5);
			$hotel->name_en = 'Name ' . $i;
			$hotel->name_ru = 'Название ' . $i;
			$hotel->save();
		}
	}
}
