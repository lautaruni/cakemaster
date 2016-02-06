<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class cake extends Model
{
	protected $table='cakes';
	public $timestamps = true;
    protected $fillable=[
    	'name','height','width','ingredient_qty','points'
    ];

    protected function getLastId(){
    	return DB::getPdo()->lastInsertId();
    }

    protected function getBestCakes(){
    	$result=DB::table($this->table)
    		->select('cakes.*')
    		->orderby('points','desc')
    		->take(5)
    		->get();
    	if(!empty($result)){
    		$aux=array();
    		foreach($result as $item){
    			$list=DB::table('ingredients')
    				->select('*')
    				->leftJoin('cake_to_ingredients','ingredients.id','=','cake_to_ingredients.ingredient_id')
    				->where('cake_to_ingredients.cake_id','=',$item->id)
    				->get();
    			$item->ingredients_list=$list;
    		}
    	}
    	return $result;
    }
}
