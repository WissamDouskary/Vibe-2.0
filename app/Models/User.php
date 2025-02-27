<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'profile_photo',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(Friends::class, 'sender_id');
    }

    public function hasRelationshipWith($userId)
    {
    return $this->sentFriendRequests()
                ->where('receiver_id', $userId)
                ->whereIn('status', ['pending', 'accepted'])
                ->exists() ||
           $this->receivedFriendRequests()
                ->where('sender_id', $userId)
                ->whereIn('status', ['pending', 'accepted'])
                ->exists();
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(Friends::class, 'receiver_id');
    }

    public function friends()
    {
        return User::whereHas('sentFriendRequests', function ($query) {
            $query->where('receiver_id', auth()->id())->where('status', 'accepted');
        })
        ->orWhereHas('receivedFriendRequests', function ($query) {
            $query->where('sender_id', auth()->id())->where('status', 'accepted');
        });
    }

    public function hasPendingRequestTo($userId)
    {
    return $this->sentFriendRequests()
                ->where('receiver_id', $userId)
                ->where('status', 'pending')
                ->exists();
    }

    public function isFriendWith($userId)
    {
        return $this->sentFriendRequests()->where('receiver_id', $userId)->where('status', 'accepted')->exists() ||
               $this->receivedFriendRequests()->where('sender_id', $userId)->where('status', 'accepted')->exists();
    }

    public function hasPendingRequestFrom($userId)
    {
        return $this->receivedFriendRequests()->where('sender_id', $userId)->where('status', 'pending')->exists();
    }

    // post methods 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //likes 
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}