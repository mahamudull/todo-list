<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'task' => 'required|max:255',
            'priority' => 'required|integer|min:1|max:5',
        ]);

        Task::create([
            'task' => $request->task,
            'priority' => $request->priority,
            'completed' => false,
        ]);

        return redirect('/')->with('success', 'Task added successfully!');
    }

    public function toggleComplete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect('/')->with('success', 'Task status updated successfully!');
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/')->with('success', 'Task deleted successfully!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|max:255',
            'priority' => 'required|integer|min:1|max:5',
        ]);

        $task = Task::findOrFail($id);
        $task->task = $request->task;
        $task->priority = $request->priority;
        $task->save();

        return redirect('/')->with('success', 'Task updated successfully!');
    }
    
}
