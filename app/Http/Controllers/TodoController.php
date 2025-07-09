<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    function homepage(){
        return view('Homepage');
    }
    function todos(){
        return view('AllTodo');
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
       
    }
}
