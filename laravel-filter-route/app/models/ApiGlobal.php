<?php

class ApiGlobal {
	
	public static function uriPackageName(){
		return  strstr(Request::path(), '/', true);
	}

	public static function loggedPackage(){
		return Package::where('name','=',ApiGlobal::uriPackageName())->first();
	}

	
}