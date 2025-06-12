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

        $today = now()->toDateString();
        $userId = auth()->id();
        $habitsWithProgress = Habit::where('user_id', $userId)
            ->with(['progressToday' => function ($query) use ($today) {
                $query->whereDate('date', $today);
            }])
            ->get()
            ->map(function ($habit) {
                $habit->is_completed_today = $habit->progressToday->isNotEmpty() ? (bool) $habit->progressToday->first()->completed : false;
                unset($habit->progressToday);
                return $habit;
            });

        return inertia('Habits', [
            'habits' => $habitsWithProgress,
        ]);
    }

    public function habitsProgress()
    {
        $habits = Habit::where('user_id', auth()->id())->get();
        $habitsProgress = [];
        foreach ($habits as $habit) {
            $progress = HabitProgress::where('habit_id', $habit->id)
                ->whereDate('created_at', today())
                ->first();
            $habitsProgress[] = [
                'habit' => $habit,
                'progress' => $progress ? true : false,
            ];
        }
        return $habitsProgress;
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

    public function updateHabit(Request $request, Habit $habit)
    {
        $date = now()->toDateString();
        $userId = auth()->id();

        if ($habit->user_id !== $userId) {
            return redirect()->route('habits.index')->with('error', 'Unauthorized action.');
        }

        HabitProgress::updateOrCreate(
            [
                'habit_id' => $habit->id,
                'user_id' => $userId,
                'date' => $date,
            ],
            [
                'completed' => $request->boolean('completed'),
            ]
        );
        return redirect()->route('habits.index')->with('success', 'Habit progress updated successfully.');
    }

    public function destroy($id)
    {
        $habit = Habit::findOrFail($id);
        if (!$habit) {
            return redirect()->route('habits.index')->with('error', 'Habit not found.');
        }

        $habit->delete();
        return redirect()->route('habits.index')->with('success', 'Habit deleted successfully.');
    }
}
