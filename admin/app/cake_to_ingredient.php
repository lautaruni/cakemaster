<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cake_to_ingredient extends Model
{
	protected $table='cake_to_ingredients';
	public $timestamps = false;
    protected $fillable=[
    	'cake_id','ingredient_id'
    ];
}
