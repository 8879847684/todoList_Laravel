<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('index', compact('todos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        Todo::create($validated);

        return redirect()->route('todos.index')->with('success', 'To-do created successfully!');
    }

    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $todo->update($validated);

        return redirect()->route('todos.index')->with('success', 'To-do updated successfully!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'To-do deleted successfully!');
    }

    public function toggle(Todo $todo)
    {
        $todo->is_completed = !$todo->is_completed;
        $todo->save();

        return redirect()->route('todos.index');
    }
}
