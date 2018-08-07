<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheetStylist extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class,'stylist_id');
    }

        protected $fillable = [
        'stylist_id',
        'mon',
        'tues',
        'wed',
        'thur',
        'fri',
        'sat',
        'sun',
    ];

}
