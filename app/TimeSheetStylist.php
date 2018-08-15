<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheetStylist extends Model
{


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

    public function user()
    {
        return $this->belongsTo('App\User', 'stylist_id', 'id');
    }

}
