<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Salon;
use App\Booking;
use App\User;

class AdminController extends Controller
{
    public function home()
    {
    	$service = Service::count();
    	$salon = Salon::count();
    	$booking = Booking::count();
    	$user = User::count();
        return view('admin.index', compact('service', 'salon', 'booking', 'user'));
    }
}
