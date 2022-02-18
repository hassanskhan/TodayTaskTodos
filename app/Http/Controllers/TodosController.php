<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    
   public function create(){
    return view('Todos.create');
   }
   public function store(TodoCreateRequest $request){

    //    $rules=[
    //            'title'=>'required|max:255'
    //    ];
    //    $messages=[
    //        'title.max'=>'Todos Title should not be Greater Than 255 char',
    //    ];
    //     $validator = Validator::make($request->all(),$rules,$messages);
    //     if ($validator->fails()) {
    //         return redirect()
    //         ->back()
    //         ->withErrors($validator)
    //         ->withInput();
    //     }
    //    dd($request->all());
    //     $request->validate([
    //         'title'=>'required|max:255',
    //     ]);


            

       Todo::create($request->all());
       return redirect()->back()->with('status','To do Created Successfully');
 
   }
   public function edit($id){
       $todoedit=Todo::find($id);
       return view('Todos.edit')->with(['todoedit'=>$todoedit]);
   }
   public function update(Request $request,$id){
            $todo=Todo::find($id);
            $todo->title=$request->title;
            $todo->save();
            return redirect()->route('todos.index')->with('status','update successfully');  
   }
   public function delete($id){
       $todo=Todo::find($id);
       $todo->delete();
       return redirect()->back()->with('status','Delete successfully');
   }
   public function complete($id){
        $todo=Todo::find($id);
        $todo->completed=true;
        $todo->save();
        return redirect()->back()->with('status','Task Complete successfully');
   }
}