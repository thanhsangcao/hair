<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
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
    	$services = Service::all();

    	return view('home', compact('services'));
    }
}
