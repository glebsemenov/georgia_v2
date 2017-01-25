<?php

use App\User;
use Illuminate\Database\Seeder;

class TestUsersSeeder extends Seeder
{
	public function run()
	{
		$user = new User();
		$user->name = 'User';
		$user->email = 'u@s.er';
		$user->password = '123';
		$user->user_type_id = 2;
		$user->save();
	}
}
