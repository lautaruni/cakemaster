<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
	protected $table='ingredients';
	public $timestamps = false;
    protected $fillable=[
    	'description','type_id'
    ];

    public function setDescriptionAttribute($val){
    	$this->attributes['description']=ucfirst($val);
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }
}
