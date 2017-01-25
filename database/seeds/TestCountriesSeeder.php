<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class TestCountriesSeeder extends Seeder
{
	public function run()
	{
		$country = new Country();
		$country->title_en = 'Country';
		$country->title_ru = 'Страна';
		$country->save();
	}
}
