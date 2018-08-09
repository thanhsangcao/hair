<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salon;
use App\User;

class PagesController extends Controller
{
    public function home()
    {
    	$salons = Salon::all();
    	$users = User::all();
    	return view('home',compact('salons','users'));
    }
}

