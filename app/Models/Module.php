<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    // * to 1
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // 1 to *
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
