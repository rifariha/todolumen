<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request as Req;
use App\Todo as ModelTodo;

class todoController extends Controller
{
   
    public function index(){
        
        $data = ModelTodo::all();
        return response($data);
    }
    public function show($id){
        $data = ModelTodo::where('id',$id)->get();
        return response ($data);
    }
    public function store (Req $request){
        $data = new ModelTodo();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();
    
        return response('Berhasil Tambah Data');
    }

    public function update(Req $request, $id){
        $data = ModelTodo::where('id',$id)->first();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function destroy($id){
        $data = ModelTodo::where('id',$id)->first();
        $data->delete();
    
        return response('Berhasil Menghapus Data');
    }
}
