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
        return view('tasks.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|alpha|max:255',
            'description' => 'required|string',
            'email' => 'required|email|unique:tasks,email', // Assuming your model is named Task
            'phone' => 'required|string|digits:10|unique:tasks,phone', // Assuming your model is named Task
            'status' => 'required|in:pending,completed',
        ]);
        // Create a new task with the validated data
        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }


    public function edit(Task $task)
    {
        return view('tasks.form', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|alpha|max:255',
            'description' => 'required|string',
            'email' => 'required|email|unique:tasks,email', // Assuming your model is named Task
            'phone' => 'required|string|digits:10|unique:tasks,phone', // Assuming your model is named Task
            'status' => 'required|in:pending,completed',
        ]);

        // Find the task by ID and update it with the validated data
        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
