<?php

namespace App\Http\Controllers\Site;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salon;
use App\Booking;
use App\User;
use App\TimeSheetStylist;
use App\Http\Requests\SiteFormRequest;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
class SiteController extends Controller
{
    public function create()
    {
        return view('sites.booking');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $phone_number = $request->phone_number;
        Session::put('name', $name);
        Session::put('phone_number', $phone_number);

        return redirect('/booking')->with('status', trans(''));
    }
    public function creates()
    {
        $salon = Salon::all();
        $salon = Salon::where('id', '<>', 1)->get();
        $user = User::where('permission', 2)->get();

        return view('sites.booking1', compact('user', 'salon'));
    }

    public function stores(Request $request)
    {
        $name = $request->name;
        $phone_number = $request->phone_number;
        $salon_id = $request->salon;
        Session::put('name', $name);
        Session::put('phone_number', $phone_number);
        Session::put('salon_id', $salon_id);

        return redirect('/bookings')->with('status', trans(''));
    }
    public function getThem()
    {
        $salon = Salon::all();
        $timesheetstylist = TimeSheetStylist::all();
        $salon = Salon::where('id', '<>', 1)->get();
        $user = User::where('permission', 2)->get();

        return view('sites.booking2', compact('user', 'salon', 'timesheetstylist'));
        
    }

    public function postThem(Request $request)
    {
        $name = $request->name;
        $phone_number = $request->phone_number;
        $salon_id = $request->salon_id;
        $stylist_id = $request->user;
        Session::put('name', $name);
        Session::put('phone_number', $phone_number);
        Session::put('salon_id', $salon_id);
        Session::put('stylist_id', $stylist_id);

        return redirect('/bookingss')->with('status', trans(''));
    }
     public function getThems()
    {

        $timesheetstylist = TimeSheetStylist::all();
        $user = User::where('permission', 2)->get();
        $salon = Salon::where('id', '<>', 1)->get();

        return view('sites.booking3', compact('user', 'salon', 'timesheetstylist'));
    }

    public function postThems(Request $request)
    {
        $booking = new Booking;
        $booking = $booking->create([
            'salon_id' => $request['salon_id'],
            'status' => trans('booking.nobook'),
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'time_booking' => $request['timesheetstylist'],
            'stylist_id' => $request['stylist_id']
        ]);
        $booking->save();

        return redirect('/')->with('status', trans(''));
    }
}
