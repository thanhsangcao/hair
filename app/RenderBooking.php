<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Salon;
class RenderBooking extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['day', 'time_start', 'status','salon_id'];
}
