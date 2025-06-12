<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'frequency',
        'goal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function progressToday(){
        return $this->hasMany(HabitProgress::class)
            ->whereDate('date', Carbon::now()->toDateString());
    }

    public function progress()
    {
        return $this->hasMany(HabitProgress::class);
    }
}
