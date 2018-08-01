<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'address'];
}
