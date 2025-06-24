<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($task) {
                if ($task->priority == 'low') {
                    $task->color = '10b981'; // Light green for low priority
                } elseif ($task->priority == 'medium') {
                    $task->color = '6366f1';
                } elseif ($task->priority == 'high') {
                    $task->color = 'f59e42';
                }
                return $task;
            });
        $total = $task->count();

        return inertia('Tasks', [
            'tasks' => $task,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'priority' => 'required|string|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a task.');
        }

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request['title'],
            'description' => $request['description'],
            'notes' => $request['notes'],
            'priority' => $request['priority'],
            'due_date' => $request['due_date'] ? $request['due_date'] : null,
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'priority' => 'required|string|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        if (!$task) {
            return redirect()->route('tasks.index')
                ->with('error', 'Task not found.');
        }

        $task->update($validatedData);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task = Task::findOrFail($task->id);

        if (!$task) {
            return redirect()->route('tasks.index')
                ->with('error', 'Task not found.');
        }
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
