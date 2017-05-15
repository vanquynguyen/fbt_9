<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itinerary extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tour_id',
        'day',
        'description',
    ];

    /**
     * Get itinerary's tour
     */
    public function tour()
    {
        return $this->belongsTo(Tour::Class);
    }
}
