<?php

namespace App\Models;

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
    public function progress()
    {
        return $this->hasMany(HabitProgress::class);
    }
}
