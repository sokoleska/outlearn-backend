<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        "gender",
        "birth_date",
        "school_year",
        "field_of_study",
        "current_school"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 to 1
    public function newsletter_subscription()
    {
        return $this->belongsTo(Newsletter_subscription::class);
    }

    // * to *
    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'student_interests');
    }

    // * to *
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'achievements_student');
    }

    // 1 to *
    public function progress()
    {
        return $this->hasMany(StudentProgress::class);
    }

    // 1 to *
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
