<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Salon;
use App\Booking;

class AdminController extends Controller
{
    public function home()
    {
    	$service = Service::count();
    	$salon = Salon::count();
    	$booking = Booking::count();
        return view('admin.index', compact('service', 'salon', 'booking'));
    }
}
