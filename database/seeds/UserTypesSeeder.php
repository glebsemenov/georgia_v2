<?php

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
	public function run()
	{
		$uType = new UserType();
		$uType->title_ru = 'Клиент';
		$uType->title_en = 'Client';
		$uType->save();

		$uType = new UserType();
		$uType->title_ru = 'Партнер';
		$uType->title_en = 'Partner';
		$uType->save();
	}
}
