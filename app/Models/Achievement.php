<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    // * to *
    public function students()
    {
        return $this->belongsToMany(Student::class, 'achievements_student');
    }
}
