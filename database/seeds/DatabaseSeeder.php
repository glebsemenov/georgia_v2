<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call( UserTypesSeeder::class );
		$this->call( PropertyTypesSeeder::class );
		$this->call( TestCountriesSeeder::class );
		$this->call( TestCitiesSeeder::class );
		$this->call( TestUsersSeeder::class );
		$this->call( TestHotelsSeeder::class );
	}
}
