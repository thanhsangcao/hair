<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $fillable = [
        'payment_date', 'payment_type', 'payment_amount', 'booking_id',
    ];

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }
}
