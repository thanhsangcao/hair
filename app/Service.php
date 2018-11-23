<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $fillable = ['name', 'price', 'description', 'img', 'show', 'delete'];

    public function bookings()
    {
        return $this->belongsToMany('App\Booking', 'booking_service', 'service_id', 'booking_id');
    }
}
