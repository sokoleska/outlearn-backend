<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    // 1 to *
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
