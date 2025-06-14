<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\HabitProgress;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class HabitsController extends Controller
{
    public function index()
    {

        $today = now()->toDateString();
        $yesterday = Carbon::yesterday()->toDateString();
        $userId = auth()->id();
        $habitsWithProgress = Habit::where('user_id', $userId)
            ->with(['progressToday' => function ($query) use ($today) {
                $query->whereDate('date', $today);
            }])
            ->get()
            ->map(function ($habit) {
                $habit->is_completed_today = $habit->progressToday->isNotEmpty() ? (bool) $habit->progressToday->first()->completed : false;

                $displayedStreak = 0;

                if ($habit->progressToday->isNotEmpty()) {
                    $displayedStreak = $habit->progressToday->first()->streak;
                } else {
                    if ($habit->progressYesterday->isNotEmpty() && $habit->progressYesterday->first()->completed) {
                        $displayedStreak = $habit->progressYesterday->first()->streak;
                    } else {
                        $displayedStreak = 0;
                    }
                }
                $habit->streak_today = $displayedStreak;

                unset($habit->progressToday);   
                unset($habit->progressYesterday);
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
            'frequency' => 'required|string|max:50',
            'goal' => 'required|integer|min:1',
        ]);
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Habit::create([
            'user_id' => auth()->id(),
            'title' => $request['title'],
            'frequency' => $request['frequency'],
            'goal' => $request['goal'],
        ]);
        return redirect()->route('habits.index')->with('success', 'Habit created successfully.');
    }

    public function updateHabit(Request $request, Habit $habit)
    {
        $today = Carbon::now()->toDateString();
        $userId = auth()->id();
        $yesterday = Carbon::yesterday()->toDateString();

        if ($habit->user_id !== $userId) {
            return redirect()->route('habits.index')->with('error', 'Unauthorized action.');
        }

        $progressToday = HabitProgress::firstOrNew(
            [
                'habit_id' => $habit->id,
                'user_id' => $userId,
                'date' => $today,
            ]
        );

        $progressYesterday = HabitProgress::where('habit_id', $habit->id)
            ->where('user_id', $userId)
            ->whereDate('date', $yesterday)
            ->first();

        $newStreak = 0;
        $is_completed_today = $request->boolean('completed');
        if ($is_completed_today) {
            if ($progressYesterday && $progressYesterday->completed) {
                $newStreak = $progressYesterday->streak + 1;
            } else {
                $newStreak = 1;
            }
        }

        $progressToday->completed = $is_completed_today;
        $progressToday->streak = $newStreak;
        $progressToday->save();

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
