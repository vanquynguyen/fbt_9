<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'cat_type',
    ];

    /**
     * Get category's tours
     */
    public function tours()
    {
        return $this->hasMany(Tour::Class);
    }

    /**
     * Get category's posts
     */
    public function posts()
    {
        return $this->hasMany(Post::Class);
    }
}
