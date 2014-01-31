<?php

class ApiControllerHelper{


	public static function show($filter=null){
		$p = Package::with('objects.attributes.values')->get();
		return Response::json($p);
	}
	
	public static function features($filter=null){
		$p = Package::with('objects.attributes.values')->find(ApiGlobal::loggedPackage()->id);
		$allData=array();
		//$p = Package::all();
		// foreach($package as $p)
		// {
		$allData['package']=$p->name;
		$allData['type']="FeatureCollection";
		$data=array();
		foreach($p->objects as $obj)
		{
			
			$attr=array();
			foreach ($obj->attributes as $d ) 
			{
				$val=array();
				foreach($d->values as $v)
				{
					array_push($val,$v->data);
				}
				$attr[$d->name] = (count($val) > 1 ? $val : array_shift($val));//address
				
				

			}

			$data[$obj->name] =$attr;
		}

				// array_push($allData,$data);
			// }
		$allData['feature']=[$data];

		return Response::json($allData);
	}
}