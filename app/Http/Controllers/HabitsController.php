<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\HabitProgress;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HabitsController extends Controller
{
    public function index()
    {
        return inertia('Habits');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Habit::create([
            'user_id' => auth()->id(),
            'title' => $request['title'],
            'description' => $request['description'],
        ]);
        return redirect()->route('habits.index')->with('success', 'Habit created successfully.');
    }
}
