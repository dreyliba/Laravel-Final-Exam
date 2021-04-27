<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Todo;

class todoController extends Controller
{   
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function addToDo()
    {
        return view('add');
    }

    public function saveTodo(Request $request)
    {
        $todo = new Todo;

        $todo->title = $request->input('title');
        $todo->due_date = $request->input('due_date');
        $todo->description = $request->input('description');
        $todo->save();

        if($todo->save()){
            return redirect('/');
        }
    }
}
