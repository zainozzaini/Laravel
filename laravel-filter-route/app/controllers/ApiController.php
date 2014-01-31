<?php

class ApiController extends \BaseController{

	public function index(){
	
  	// 	$package = Package::with('objects.attributes')->find(ApiGlobal::loggedPackage()->id);
			// return Response::json($package);
		
		switch(Request::get('cmd'))
		{
			case('show'):
				return ApiControllerHelper::show();
			case('features'):
				return ApiControllerHelper::features();
			case('testval'):
				return var_dump(Value::all());
			default:
				return ApiResponse::objectNotFound();
		}
		
	}


}