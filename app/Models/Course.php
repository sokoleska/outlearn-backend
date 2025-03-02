<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // * to 1
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    // 1 to *
    public function modules(){
        return $this->hasMany(Module::class);
    }

    // * to 1
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 1 to *
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }

    // 1 to *
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
