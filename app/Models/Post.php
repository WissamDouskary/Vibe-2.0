<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_title', 'user_id', 'post_photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comments::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function UserAlreadyLiked()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}
