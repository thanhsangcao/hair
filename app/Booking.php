<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'salon_id',
        'status',
        'name',
        'phone_number',
        'time_booking',
        'grand_total',
        'stylist_id',
        'render_booking_id'
    ];
     public function salon()
    {
        return $this->belongsTo('App\Salon', 'salon_id', 'id');
    }
     public function user()
    {
        return $this->belongsTo('App\User', 'stylist_id', 'id');
    }
}
