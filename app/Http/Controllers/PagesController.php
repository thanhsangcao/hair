<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salon;
use App\User;
use App\Repositories\Contracts\SiteRepositoryInterface;

class PagesController extends Controller
{
	protected $siteRepository;

    public function __construct(SiteRepositoryInterface $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }
    
    public function home()
    {
    	$selectSalon = $this->siteRepository->create();
        $stylist_id = [];
        $timeSheet = [];

    	return view('home', compact('selectSalon', 'stylist_id', 'timeSheet'));
    }
}
