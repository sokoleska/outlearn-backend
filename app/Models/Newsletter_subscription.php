<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter_subscription extends Model
{
    //
    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
