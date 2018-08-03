<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RenderBooking;
use App\Salon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RenderBookingFormRequest;
class RenderBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salon = Salon::all();
        $render_bookings = RenderBooking::all();
        $render_bookings = RenderBooking::paginate(config('model.pagination'));

        return view('admin.RenderBooking.index', ['render_bookings' => $render_bookings, 'salon' => $salon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salon = Salon::all();

        return view('admin.RenderBooking.create', ['salon' => $salon]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $render_booking = new RenderBooking;
        $render_booking = $render_booking->create([
            'day' => $request['day'],
            'time_start' => $request['time_start'],
            'status' => $request['status'],
            'salon_id' => $request['salon']
        ]);
        $render_booking->save();

        return redirect('/admin/renderbookings')->with('status', trans('admin.render_create'));
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
        $salon = Salon::all();
        $render_booking = RenderBooking::findOrFail($id);

        return view('admin.RenderBooking.edit', ['salon' => $salon, 'render_booking' => $render_booking]);
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
        $render_booking = RenderBooking::findOrFail($id);
        $render_booking->day = $request->get('day');
        $render_booking->time_start = $request->get('time_start');
        $render_booking->status = $request->get('status');
        $render_booking->salon_id = $request->get('salon');
        $render_booking->save();

        return redirect('/admin/renderbookings/' . $id . '/edit')->with('status', trans('admin.render_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $render_booking = RenderBooking::destroy($id);

        return redirect('/admin/renderbookings/')->with('status', trans('admin.render_delete'));
    }
}
