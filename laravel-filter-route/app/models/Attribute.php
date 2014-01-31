<?php

class Attribute extends Eloquent {
	protected $hidden = array('id','objects_id','created_at','updated_at');
	protected $guarded = array();
	public static $rules = array();

	public function object()
    {
        return $this->belongsTo('Object');
    }

    public function values(){
		return $this->hasMany('Value','attributes_id');
	}
}
