<?php

namespace App\Repositories\Eloquents;

use App\Booking;
use App\Service;
use App\User;
use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public function all()
    {
        return Booking::all();
    }
    public function find($id)
    {
    	return Booking::findOrFail($id);
    }
    public function destroy($id){
    	return Booking::destroy($id);
    }
    public function getSelectedServices($id)
    {
    	return  Service::whereDoesntHave('bookings', function($q) use ($id){ 
    				$q->where('booking_id', $id);
        		})->get();
    }
    public function getStylistBySalon($id)
    {
    	$booking = $this->find($id);
    	$stylists = User::where('salon_id', '=', $booking->salon->id)->get();
        $selectStylist = [];
        foreach($stylists as $stylist) {
            $selectStylist[ $stylist->id ] = $stylist->name;
        }

        return $selectStylist;
    }
    public function changeStatus($id, $status_id)
    {
    	$booking = $this->find($id);
        if ($status_id == trans('booking.new')) {
            $booking->status = trans('booking.new');
        }else if($status_id == trans('booking.confirm')) {
            $booking->status = trans('booking.confirm');
        }else if($status_id == trans('booking.complete')) {
            $booking->status = trans('booking.complete');
        }else if($status_id == trans('booking.cancel')) {
            $booking->status = trans('booking.cancel');
        }
        $booking->save();
    }
}
