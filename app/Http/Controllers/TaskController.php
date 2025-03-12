<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);
    
        $task->update($request->only(['title', 'description']));


        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function toggleCompletion(Task $task)
{
    $task->is_completed = !$task->is_completed; 
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');
}


    public function markAllAsDone()
    {
        Task::query()->update(['is_completed' => true]);

        return redirect()->route('tasks.index')->with('success', 'All tasks marked as done!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
