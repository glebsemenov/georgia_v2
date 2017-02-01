<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
	public function run()
	{
		$gender = new Gender();
		$gender->title_ru = 'женский';
		$gender->title_en = 'female';
		$gender->save();

		$gender = new Gender();
		$gender->title_ru = 'мужской';
		$gender->title_en = 'male';
		$gender->save();
	}
}
