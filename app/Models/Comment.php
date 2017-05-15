<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * That attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];

    /**
     * Get user's comment
     */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    /**
     * Get post's comment
     */
    public function post()
    {
        return $this->belongsTo(Post::Class);
    }
}
