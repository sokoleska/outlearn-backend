<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // * to 1
    public function quizzes()
    {
        return $this->belongsTo(Quiz::class);
    }

    // 1 to *
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
