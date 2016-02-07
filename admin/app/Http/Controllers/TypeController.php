<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Type;
use Redirect;

class TypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $types=Type::all();
        return view('type.index',['types'=>$types]);
    }

    public function create(Request $request){
        return view('type.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'description'=>'required'
            ]);
        Type::create([
            'description'=>$request->input('description'),
        ]);
        return Redirect::to('types');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $type=Type::find($id);
        return view('type.edit',['type'=>$type]);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'description'=>'required'
            ]);
        $type=Type::find($id);
        $type->fill($request->all());
        $type->save();
        return Redirect::to('types');
    }

    public function destroy(Request $request){
        foreach($request->input('to_delete') as $item_id){
            Type::destroy($item_id);
        }
        return Redirect::to('types');
    }

}
