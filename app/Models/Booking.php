<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tour_id',
        'fullname',
        'email',
        'country',
        'phone',
        'departure_date',
        'adult',
        'child',
        'infant',
        'total_amount',
        'orther_request',
        'status',
        'method_payment',
    ];

    /**
    * Get booking's user
    */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    /**
     * Get booking's tour
     */
    public function tour()
    {
        return $this->belongsTo(Tour::Class);
    }
}
