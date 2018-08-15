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
        $salons = Salon::where('id', '<>', 1)->get();
        $selectSalon[null] = trans('main.select');
        foreach($salons as $salon) {
            $selectSalon[ $salon->id ] = $salon->name . ' - ' . $salon->address;
        }
        

        return view('sites.booking', compact('selectSalon'));
    }

    public function store(Request $request)
    {
        $booking = Booking::create([
            'salon_id' => $request['salon_id'],
            'status' => trans('booking.nobook'),
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'time_booking' => $request['timesheet'],
            'stylist_id' => $request['stylist_id']
        ]);

        return redirect('/')->with('status', trans(''));
    }
    
    public function getStylist(Request $request){
        $salon_id = $request->salon_id;
        $users = User::where('salon_id', $salon_id)->get();
        $selectStylist[null] = trans('main.select');
        foreach ($users as $user) {
            $selectStylist[ $user->id ] = $user->name;
        }
        $view = view("sites.choose_stylist", compact('selectStylist','users'))->render();

        return response()->json(['html' => $view]);
    }

    public function getTimesheet(Request $request){
        $stylist_id = $request->stylist_id;
        $timeSheet = TimeSheetStylist::where('stylist_id', $stylist_id)->first();
        $view = view("sites.choose_timesheet", compact('timeSheet'))->render();

        return response()->json(['html' => $view]);
    }
}
