<?php

class ApiResponse{
	
	/*
	|--------------
	|Error Messages
	|--------------
	*/
	public static function error($message,$code){
		return Response::json([
				"error" => true,
				"message" => $message
			],
			$code);
	}

	public static function objectNotFound(){
		return Response::json([
				"error" => true,
				"message" => "Object not found."
			],
			404);
	}

	/*
	|-----------------
	|Request generated
	|-----------------
	*/
	public static function response($packageInfo,$data){
		
		$result = ApiResponse::packageHeader();
		$result['error']=false;
		$result['data']=json_decode($data);		
		
		return Response::json($result);
	}

	private static function packageHeader(){
		$package = ApiGlobal::loggedPackage();
		return [
					"nameP"=>$package->name,
					"updated"=>$package->created_at,
			    ];
	}



}