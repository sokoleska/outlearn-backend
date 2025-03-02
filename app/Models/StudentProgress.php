<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    // Define the inverse relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Define the inverse relationship with Lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
