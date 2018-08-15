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
    public function stylist()
    {
        return $this->belongsTo('App\User', 'stylist_id', 'id');
    }
    public function services()
    {
        return $this->belongsToMany('App\Service', 'booking_service', 'booking_id', 'service_id');
    }
    public function bill()
    {
        return $this->hasOne('App\Bill');
    }
}
