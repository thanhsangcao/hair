<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'address'];

    public function renderBooking()
    {
        return $this->hasMany('App\RenderBooking', 'salon_id', 'id');
    }
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
