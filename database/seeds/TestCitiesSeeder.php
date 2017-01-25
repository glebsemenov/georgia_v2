<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class TestCitiesSeeder extends Seeder
{
	public function run()
	{
		$city = new City();
		$city->title_en = 'City';
		$city->title_ru = 'Город';
		$city->country_id = 1;
		$city->save();
	}
}
