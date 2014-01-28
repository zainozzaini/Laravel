<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// public function showWelcome()
	// {
	// 	return View::make('hello');
	// }

	public function home(){

		// $user = User::find(2);
		// print_r($user->email);

		// Mail::send('emails.auth.test',array('name'=>'zzz'),function($message){
		// 	$message->to('zainoz.zaini@gmail.com','ZZA')->subject('Test Email from Laravel');
		// });

		
		return View::make('home');
	}

}