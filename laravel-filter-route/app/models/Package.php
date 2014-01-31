<?php

class Package extends Eloquent {


	protected $table = 'packages';
	protected $hidden = array('id','created_at','updated_at');
	//protected $guarded = array();
	//public static $rules = array();


	public function objects(){
		// return $this->hasManyThrough('Object', 'Attribute','objects_id','packages_id');
		return $this->hasMany('Object', 'packages_id');
	}

}
