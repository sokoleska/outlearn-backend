<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "role_id",
        "profile_picture"
    ];

    // 1 to 1
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function professor()
    {
        return $this->hasOne(Professor::class);
    }

    // * to 1
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // 1 to *
    public function forumThreads()
    {
        return $this->hasMany(ForumThread::class);
    }

    public function forumComments()
    {
        return $this->hasMany(ForumComment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
