<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentInterest extends Pivot
{
    // public function student()
    // {
    //     return $this->belongsTo(Student::class, 'student_id');
    // }

    // public function interest()
    // {
    //     return $this->belongsTo(Interest::class, 'interest_id');
    // }
}
