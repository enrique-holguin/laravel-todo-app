<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Exception;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $your_custom_error = null;
        return view('list', compact('todos','your_custom_error'));
    }

    public function store(Request $request)
    {
       $request->validate([
        'task' => 'required',
       ]);

       Todo::create(['task' => $request->task]);
       
       return redirect()->route('todo.index');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('edit', compact('todo'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'task' => 'required',
        ]);
        $todo = Todo::findOrFail($id);
        $todo->update(['task' => $request->task]);
        return redirect()->route('todo.index');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
