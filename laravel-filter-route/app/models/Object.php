<?php

class Object extends Eloquent {
	protected $table = 'objects';
	protected $hidden = array('id','packages_id','created_at','updated_at');
	// protected $guarded = array();
	// public static $rules = array();

	public function package()
    {
        // return $this->belongsTo('Package');
        return $this->belongsTo('Package');
    }

    public function attributes(){
		return $this->hasMany('Attribute','objects_id');
	}

	
}

