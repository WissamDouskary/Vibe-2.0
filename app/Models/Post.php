<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_title', 'user_id', 'post_photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
