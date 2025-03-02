<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    public function forumThreads()
    {
        return $this->belongsTo(ForumThread::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
