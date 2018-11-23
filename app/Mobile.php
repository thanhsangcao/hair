<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
	protected $fillable = ['telephone', 'user_id'];	
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
