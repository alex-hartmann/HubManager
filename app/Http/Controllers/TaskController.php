<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->orderBy('due_date', 'asc')
            ->get()
            ->map(function ($task) {
                $task->is_completed = $task->status === 'pending' ? false : true;
                $priorityColors = [
                    'low'    => '10b981',
                    'medium' => '6366f1',
                    'high'   => 'f59e42',
                ];
                $task->color = $priorityColors[$task->priority] ?? '000000';
                return $task;
            });
        $total = $task->count();
        $tasksCompletedWeek = $this->tasksCompletedAtThisWeek();

        return inertia('Tasks', [
            'tasks' => $task,
            'total' => $total,
            'tasksCompletedWeek' => $tasksCompletedWeek,
        ]);
    }

    public function tasksCompletedAtThisWeek()
    {
        $tasksCompletedWeek = Task::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->get()
            ->map(function ($task) {
                $task->completed_day = $task->updated_at->dayName;
                return $task;
            });



        return $tasksCompletedWeek;
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

    public function updateStatus(Request $request, Task $task)
    {
        $task = Task::findOrFail($task->id);

        if (!$task) {
            return redirect()->route('tasks.index')
                ->with('error', 'Task not found.');
        }

        $task->status = $request['status'] === 'completed' ? 'completed' : 'pending';
        $task->save();

        return redirect()->back()
            ->with('success', 'Task status updated successfully.');
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
