<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Service;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Eloquents\BookingRepository;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->all();

        return view('admin.booking.index', compact('bookings'));
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
       
        $booking = $this->bookingRepository->find($id);
        $services = $this->bookingRepository->getSelectedServices($id);
        $selectStylist = $this->bookingRepository->getStylistBySalon($id);
        $selectedStylist = $booking->stylist->id;

        return view('admin.booking.edit', compact('booking', 'services', 'selectStylist', 'selectedStylist'));
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
        $booking = $this->bookingRepository->find($id);
        $booking->update($request->all());

        return redirect('/admin/bookings/' . $id . '/edit')->with('status', trans('admin.booking_edit'));
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->destroy($id);

        return redirect('/admin/bookings/')->with('status', trans(''));
    }
    public function changeStatus($id,$status_id)
    {
        try {
            $booking = $this->bookingRepository->changeStatus($id,$status_id);

            return redirect('/admin/bookings/' . $id . '/edit')->with('status', trans('booking.update_status'));
            
        } catch (ModelNotFoundException $e) {
            return trans('booking.false');
        }
    }
    public function addService(Request $request, $id){
        $service_id = $request->service_id;
        $booking = $this->bookingRepository->find($id);
        $booking->services()->attach($service_id);

        return $service_id;
    }
    public function deleteService(Request $request, $id){
        $booking = $this->bookingRepository->find($id);
        $service_id = $request->service_id;
        $booking->services()->detach($service_id);

        return back();
    }
}
