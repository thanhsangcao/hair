<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'address', 'permission', 'salon_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function salon()
    {
        return $this->belongsTo('App\Salon', 'salon_id', 'id');
    }

    public function timesheetStylist()
    {
        return $this->hasOne('App\TimeSheetStylist', 'stylist_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking', 'stylist_id', 'id');
    }

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
}
