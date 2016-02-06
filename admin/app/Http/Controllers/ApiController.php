<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ingredient;
use App\cake;
use App\cake_to_ingredient;

class ApiController extends Controller
{

    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        // Guardo la torta
        $this->validate($request,[
            'name'=>'required',
            'height'=>'required',
            'width'=>'required',
            'ingredient_qty'=>'required'
            ]);
        Cake::create([
            'name'=>$request->input('name'),
            'height'=>$request->input('height'),
            'width'=>$request->input('width'),
            'ingredient_qty'=>$request->input('ingredient_qty'),
            'points'=>$request->input('points')
        ]);
        $cake_id=Cake::getLastId();
        // guardo ingredientes con su torta
        $ingredients_list=json_decode($request->input('ingredients_list'));
        foreach($ingredients_list as $item){
            cake_to_ingredient::create([
                    'cake_id'=>$cake_id,
                    'ingredient_id'=>$item
                ]);
        }
        return response()->json(['message'=>'ok']);

    }

    public function show($id){
        if($id==0){
            $ingredients=Ingredient::all();
            foreach($ingredients as $key => $item){
                $ingredients[$key]['type']=\App\Type::find($item->type_id);
            }
            return response()->json(['ingredients'=>$ingredients]);
        }else{
            $aux=\App\Type::all();
            $types=$this->getTypes($aux);
            $ingredient=Ingredient::find($id);
            return response()->json(['ingredient'=>$ingredient,'types'=>$types]);
        }
    }

    public function getBestsCakes(){
        return response()->json(['bests'=>cake::getBestCakes()]);
    }

    public function edit($id){

    }

    public function update(Request $request){

    }

    public function destroy($id){

    }
}
