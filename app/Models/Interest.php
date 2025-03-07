<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    // * to *
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_interests', 'interest_id', 'student_id')->using(StudentInterest::class);;
    }
}
