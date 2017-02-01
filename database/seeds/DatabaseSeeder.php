<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call( UserTypesSeeder::class );
		$this->call( PropertyTypesSeeder::class );
		$this->call( GendersSeeder::class );
		$this->call( TestCountriesSeeder::class );
		$this->call( TestCitiesSeeder::class );
	}
}
