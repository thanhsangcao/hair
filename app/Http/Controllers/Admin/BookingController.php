<?php
 namespace App\Http\Controllers\Admin;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RenderBooking;
use App\Salon;
use App\TimeSheetStylist;
use App\User;
use App\Booking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RenderBookingFormRequest;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheetstylist = TimeSheetStylist::all();
        $user = User::where('permission', 2)->get();
        $salon = Salon::where('id', '<>', 1)->get();
        $booking = Booking::all();
        $booking = Booking::paginate(config('model.pagination'));
        
         return view('admin.booking.index', compact('user', 'salon', 'booking', 'timesheetstylist'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timesheetstylist = TimeSheetStylist::all();
        $user = User::where('permission', 2)->get();
        $salon = Salon::where('id', '<>', 1)->get();
        $booking = Booking::findOrFail($id);
        
        return view('admin.booking.edit', compact('user', 'salon', 'booking', 'timesheetstylist'));
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->salon_id = $request->get('salon_id');
        $booking->name = $request->get('name');
        $booking->phone_number = $request->get('phone_number');
        $booking->time_booking = $request->get('time');
        $booking->stylist_id = $request->get('stylist_id');
        $booking->status = $request->get('status');
        $booking->save();

        return redirect('/admin/bookings/' . $id . '/edit')->with('status', trans(''));
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::destroy($id);

        return redirect('/admin/bookings/')->with('status', trans(''));
    }
}
