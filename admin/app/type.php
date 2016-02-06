<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
	protected $table='types';
	public $timestamps = false;
    protected $fillable=[
    	'description'
    ];

    public function setDescriptionAttribute($val){
    	$this->attributes['description']=ucfirst($val);
    }
}
