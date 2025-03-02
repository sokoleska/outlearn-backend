<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    // * to 1
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // 1 to *
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
