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
                $task->completed_at_formatted = $task->updated_at->format('d-m-Y H:i');
                return $task;
            });


        $taskPending = $task->where('status', 'pending');
        $totalPending = $taskPending->count();
        $tasksCompletedWeek = $task->where('status', 'completed')
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->map(function ($task) {
                $task->completed_day = $task->updated_at->dayName;
                return $task;
            });
        $tasksCompletedMonth = $task->where('status', 'completed')
            ->whereBetween('updated_at', [now()->startOfMonth(), now()->endOfMonth()]);

        $totalCompletedMonth = $tasksCompletedMonth->count();
        $total = $task->count();
        $totalPercentage = 0;
        if ($total > 0) {
            $totalPercentage = round(($totalCompletedMonth / $total) * 100);
        } else {
            $totalPercentage = 0;
        }

        return inertia('Tasks', [
            'tasks' => $taskPending,
            'alltasks' => $task,
            'totalPending' => $totalPending,
            'tasksCompletedWeek' => $tasksCompletedWeek,
            'totalCompleted' => $totalCompletedMonth,
            'total' => $totalPercentage,
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

    public function reopen(Task $task)
    {
        $task = Task::findorFail($task->id);
        if (!$task) {
            return redirect()->route('tasks.index')
                ->with('error', 'Task not found.');
        }
        $task->status = 'pending';
        $task->save();
        return redirect()->route('tasks.index')
            ->with('success', 'Task reopened successfully.');
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
