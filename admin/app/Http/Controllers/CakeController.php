<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\Cake;

class CakeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cakes=Cake::all();
    	return view('cake.index',['cakes'=>$cakes]);
    }

    public function create(Request $request){
    	return view('cake.create');
    }

    public function store(Request $request){
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
            'points'=>0
        ]);
        return Redirect::to('cakes');
    }

    public function show($id){
    	//
    }

    public function edit($id){
        $cake=cake::find($id);
        return view('cake.edit',['cake'=>$cake]);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'height'=>'required',
            'width'=>'required',
            'ingredient_qty'=>'required'
            ]);
        $cake=Cake::find($id);
        $cake->fill($request->all());
        $cake->save();
        return Redirect::to('cakes');
    }

    public function destroy(Request $request){
        foreach($request->input('to_delete') as $item_id){
            Cake::destroy($item_id);
        }
        return Redirect::to('cakes');
    }
}
