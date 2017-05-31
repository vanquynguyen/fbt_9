<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Search;

class Tour extends Model
{
    use SoftDeletes;

    /**
     *
     * The atttributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'duration',
        'price',
        'min_quantity',
        'max_quantity',
        'promotion',
        'single_supplement',
    ];

    /**
     * Get tour's bookings
     */
    public function bookings()
    {
        return $this->hasMany(Booking::Class);
    }

    /**
     * Get tour's itineraries
     */
    public function itineraries()
    {
        return $this->hasMany(Itinerary::Class);
    }

    /**
     * Get category's tour
     */
    public function category()
    {
        return $this->belongsTo(Category::Class);
    }

    public function getImageAttribute($value)
    {
        return asset(config('custom.defaultPath').$value);
    }

    public function scopeSearch($query, $keyword)
    {
        $keyword = Search::search($keyword);
        return $query->where('name', 'like', "%$keyword%");
    }
}
