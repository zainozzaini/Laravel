<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/',[
		'as' 	=> 'home',
		'uses' 	=> 'HomeController@home'
]);


Route::get('/user/{username}',[
	'as' 	=> 'profile-user',
	'uses'	=> 'ProfileController@user'
]);



/*
|Unauthenticated group
*/
Route::group(array('before'=>'guest'),function(){

	
	Route::group(array('before'=>'csrf'),function(){
		/*
	|CSRF protection group
	*/


			/*
			|Create account (POST)
			*/
				Route::post('/account/create',[
				'as'		=> 'account-create-post',
				'uses'		=> 'AccountController@postCreate'
				]);

				/*
			|Sign in (POST)
			*/

				Route::post('/account/sign-in',[
					'as'		=> 'account-sign-in-post',
					'uses'		=> 'AccountController@postSignIn'
				]);

			/*
			|Forgot password (POST)
			*/
			Route::post('/account/forgot-passoword',[
				'as'	=> 'account-forgot-password-post',
				'uses'	=> 'AccountController@postForgotPassword'
			]);
	});




	/*
	|Forgot password (GET)
	*/
	Route::get('/account/forgot-passoword',[
		'as'	=> 'account-forgot-password',
		'uses'	=> 'AccountController@getForgotPassword'
	]);


	Route::get('/account/recover/{code}',[
		'as'	=> 'account-recover',
		'uses'	=> 'AccountController@getRecover'
	]);


	/*
	|Sign in (GET)
	*/

	Route::get('/account/sign-in',[
		'as'		=> 'account-sign-in',
		'uses'		=> 'AccountController@getSignIn'
	]);


	/*
	|Create account (GET)
	*/

	Route::get('/account/create',[
		'as'		=> 'account-create',
		'uses'		=> 'AccountController@getCreate'
	]);


	Route::get('/account/activate/{code}',[
			'as'	=> 'account-activate',
			'uses'	=>	'AccountController@getActivate'
		]);





});


/*
|Authenticated group
*/
Route::group(['before'=>'auth'],function(){

	/*
	|Change passord (GET)
	*/
	Route::get('/account/change-password',[
		'as' 	=> 'account-change-password',
		'uses'	=>	'AccountController@getChangePassword'
	]);	

	/*
	|Sign out (GET)
	*/
	Route::get('/account/sign-out',[
		'as' 	=> 'account-sign-out',
		'uses'	=>	'AccountController@getSignOut'
	]);	


	/*
	|CSRF protection group
	*/

	Route::group(['before'=>'csrf'],function(){
			/*
			|Change password (POST)
			*/
			Route::post('/account/change-password',[
				'as' => 'account-change-password-post',
				'uses' => 'AccountController@postChangePassword'
			]);
	});



	

});