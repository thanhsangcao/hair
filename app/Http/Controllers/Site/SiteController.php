<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salon;
class SiteController extends Controller
{
    public function create()
    {
        return view('sites.booking');
    }

    public function store()
    {
        return redirect('/booking')->with('status', trans(''));
    }

    public function creates()
    {
        $salon = Salon::all();

        return view('sites.booking1', ['salon' => $salon]);
    }

    public function stores()
    {
        return redirect('/bookings')->with('status', trans(''));
    }

    public function getThem()
    {
        $salon = Salon::all();

        return view('sites.booking2', ['salon' => $salon]);
    }

    public function postThem()
    {
    }
}
