<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('id', 'day', 'start_time', 'state', 'created_at');
    }
    public function course_users()
    {
        return $this->hasMany(Course_User::class);
    }
}
