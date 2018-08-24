<?php

namespace App\Repositories\Eloquents;

use App\Salon;
use App\User;
use App\TimeSheetStylist;
use App\Booking;
use App\Repositories\Contracts\SiteRepositoryInterface;

class SiteRepository implements SiteRepositoryInterface
{
    public function create()
    {
        $salons = Salon::where('id', '<>', 1)->get();
        $selectSalon[null] = trans('main.select');
        foreach($salons as $salon) {
            $selectSalon[ $salon->id ] = $salon->name . ' - ' . $salon->address;
        }

        return $selectSalon;
    }
    public function store($input)
    {
        return Booking::create($input);
    }
    public function getStylist($id)
    {
        return User::where('salon_id', $id)->get();
    }

    public function getTimeSheet($id)
    {
        return TimeSheetStylist::where('stylist_id', $id)->first();
    }
}
