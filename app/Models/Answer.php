<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // * to 1
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
