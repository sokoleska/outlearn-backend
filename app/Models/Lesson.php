<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    // * to 1
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    // 1 to *
    public function progress()
    {
        return $this->hasMany(StudentProgress::class);
    }
}
