<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'content',
    ];

    /**
     * Get post's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }

    /**
     * Get category's post
     */
    public function category()
    {
        return $this->belongsTo(Category::Class);
    }

    /**
     * Get post's user
     */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
