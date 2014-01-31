<?php

class Value extends Eloquent {
	protected $hidden = array('id','attributes_id','created_at','updated_at');
	protected $guarded = array();
	public static $rules = array();

	public function object()
    {
        return $this->belongsTo('Attribute');
    }

    
}
