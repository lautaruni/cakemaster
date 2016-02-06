<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Redirect;

class IngredientController extends Controller
{
    public function index(){
        $ingredients=Ingredient::all();
        foreach($ingredients as $key => $item){
            $ingredients[$key]['type']=\App\Type::find($item->type_id);
        }
    	return view('ingredient.index',array('ingredients'=>$ingredients));
    }

    public function create(Request $request){
        $aux=\App\Type::all();
        $types=$this->getTypes($aux);
    	return view('ingredient.create',array('types'=>$types));
    }

    public function store(Request $request){
        $this->validate($request,[
            'description'=>'required',
            'type_id'=>'required'
            ]);
    	Ingredient::create([
            'description'=>$request->input('description'),
            'type_id'=>$request->input('type_id')
        ]);
        return Redirect::to('ingredients');
    }

    public function show($ingredients){
    }

    public function edit($id){
        $aux=\App\Type::all();
        $types=$this->getTypes($aux);
    	$ingredient=Ingredient::find($id);
        return view('ingredient.edit',['ingredient'=>$ingredient,'types'=>$types]);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'description'=>'required',
            'type_id'=>'required'
            ]);
        $ingredient=Ingredient::find($id);
        $ingredient->fill($request->all());
        $ingredient->save();
        return Redirect::to('ingredients');
    }

    public function destroy(Request $request){
        foreach($request->input('to_delete') as $item_id){
            Ingredient::destroy($item_id);
        }
        return Redirect::to('ingredients');
    }

    public function getTypes($aux){
        $types=array();
        foreach($aux as $type){
            $types[$type->id]=$type->description;
        }
        return $types;
    }

}
