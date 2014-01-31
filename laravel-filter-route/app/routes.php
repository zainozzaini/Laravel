<?php



Route::get('/', function()
{
	return View::make('hello');
});



Route::group(array(
		'before'=>'package_name',
		'prefix'=>ApiGlobal::uriPackageName()
	),
	function(){
		//Route::resource('reqP','PackageController');
		//Route::resource('obj',"ObjectController");
		Route::resource('reqP','ApiController');
	}
);