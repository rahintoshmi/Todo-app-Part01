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
        $todos = Todo::orderBy('status','ASC')->latest()->paginate(20);
        return view('AllTodo',compact('todos'));
    }
    function storeTodo(TodoRequest $request , $id = null){
        try{
             //store data
        $msg = $id ? 'Todo Updated Successfully!' : 'Todo Added Successfully!';     
        Todo::updateOrCreate([
            'id' => $id,
        ] , $request->all());
        return to_route('todos')->with('msg', $this->getMsg($msg));
        }
        catch(Exception $e){
            return to_route('todos')->with('msg', $this->getErrorMsg());
        }
    }
    private function getMsg($msg='success',$type='success'){
        return [
            'type' => $type,
            'res' => $msg
        ];
    }
    private function getErrorMsg(){
        return [
            'type' =>'error',
            'res' => $msg ?? 'Something went wrong! Please try again.' 
        ];
    }
    function deleteTodo($id){
        try{
             $todo = Todo::findOrFail($id)->delete();
             return to_route('todos')->with('msg', $this->getMsg('Todo Deleted Successfully!'));
        }
        catch(Exception $e){
           return to_route('todos')->with('msg', $this->getErrorMsg());
        }       
    }
    function editTodo($id){
        try{
             $todo = Todo::findOrFail($id);
             return view('Edit', compact('todo')); 
        }
        catch(Exception $e){
           return to_route('todos')->with('msg', $this->getErrorMsg());
        }
    }
}
