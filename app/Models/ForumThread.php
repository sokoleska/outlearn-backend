<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    // * to 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 to *
    public function forumComments()
    {
        return $this->hasMany(ForumComment::class);
    }

    
}
