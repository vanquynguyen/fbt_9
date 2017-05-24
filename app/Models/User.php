<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Search;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'gender',
        'address',
        'phone',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get user's bookings.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::Class);
    }

    /**
     * Get user's posts
     */
    public function posts()
    {
        return $this->hasMany(Post::Class);
    }

    /*
     * Get user's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }

    /*
     * Get user's followers
     */
    public function followers()
    {
        return $this->belongsToMany(User::Class, 'follows', 'user_id', 'follower_id');
    }

    /*
     * Check Admin
     */
    public function isAdmin()
    {
        return $this->level == 1;
    }

    public function getAvatarAttribute($value)
    {
        return asset(config('custom.defaultPath') . $value);
    }
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeSearch($query, $keyword)
    {
        $keyword = Search::search($keyword);
        return $query->where('name', 'like', "%$keyword%");
    }
}
