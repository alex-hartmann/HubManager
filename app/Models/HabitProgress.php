<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitProgress extends Model
{
    protected $fillable = [
        'user_id',
        'habit_id',
        'date',
        'completed',
        'streak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
