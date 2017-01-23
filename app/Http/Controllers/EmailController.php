<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function send( Request $request )
	{
		Mail::send('send', [], function ($m) {
			$m->from('igleb.11.95@gmail.com', 'Your Application');

			$m->to('igleb.11.95@gmail.com', 'User name')->subject('Your Reminder!');
		});
	}
}
