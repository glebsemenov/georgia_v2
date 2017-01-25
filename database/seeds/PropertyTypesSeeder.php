<?php

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypesSeeder extends Seeder
{
	public function run()
	{
		$pType = new PropertyType();
		$pType->title_ru = 'Отель';
		$pType->title_en = 'Hotel';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Гостевой дом';
		$pType->title_en = 'Guest House';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Квартира / Совладение';
		$pType->title_en = 'Apartment / Condominium';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Ночлег и завтрак';
		$pType->title_en = 'Bed & Breakfast';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Общежитие';
		$pType->title_en = 'Hostel';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Курорт';
		$pType->title_en = 'Resort';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Мотель';
		$pType->title_en = 'Motel';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Коттедж';
		$pType->title_en = 'Vacation Rental';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Апарт-отель';
		$pType->title_en = 'Apartment Hotel';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Комната';
		$pType->title_en = 'Room';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Вилла';
		$pType->title_en = 'Villa';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Ферма';
		$pType->title_en = 'Farm Stay';
		$pType->save();

		$pType = new PropertyType();
		$pType->title_ru = 'Другое';
		$pType->title_en = 'Other';
		$pType->save();
	}
}
