<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'price'];

    public function bookings()
    {
        return $this->belongsToMany('App\Booking', 'booking_service', 'service_id', 'booking_id');
    }
}
