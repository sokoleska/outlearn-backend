<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    /** @use HasFactory<\Database\Factories\ProfessorFactory> */
    use HasFactory;

    protected $fillable = ['position', 'company', 'gender', 'birth_date', 'work_experience_years'];


    // 1 to 1
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 to *
    public function courses()    {
        return $this->hasMany(Course::class);
    }
}
