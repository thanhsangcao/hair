<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salon extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $fillable = ['name', 'address'];

    public function renderBooking()
    {
        return $this->hasMany('App\RenderBooking', 'salon_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking', 'salon_id', 'id');
    }
    
    public function users()
    {
        return $this->hasMany('App\User', 'salon_id', 'id');
    }
}
