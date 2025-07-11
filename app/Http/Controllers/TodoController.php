<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function homepage(){
        return view('Homepage');
    }
    function todos(){
        // $todos = Todo::orderBy('status','ASC')->latest()->get();
        $todos = Todo::orderBy('status','ASC')->latest()->paginate(3);
        return view('AllTodo',compact('todos'));
    }
    function storeTodo(Request $request){
        //validations
        $request->validate([
            'title' => 'required|min:3|max:10',
            'detail' => 'required|min:20|max:200',
            'author' => 'required|min:3|max:20',
            'date' =>  'required|after_or_equal:today',
            
        ],[
            'title.required' => 'Title koi??',
            'author.required' => 'Author name is required!!!!!',
           
        ]);
        //store data
        Todo::create($request->all());
        return to_route('todos')->with('msg', [
            'type' => 'success',
            'res' => 'Todo Added Successfully!'
        ]);
       
    }
}
