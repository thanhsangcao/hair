<?php

namespace App\Http\Controllers\Site;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Http\Requests\SiteFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Contracts\SiteRepositoryInterface;

class SiteController extends Controller
{
    protected $siteRepository;

    public function __construct(SiteRepositoryInterface $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function create()
    {
        $selectSalon = $this->siteRepository->create();
        $stylist_id = [];
        $timeSheet = [];

        return view('sites.booking', compact('selectSalon', 'stylist_id', 'timeSheet'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['status'] = trans('booking.new');
        $input['grand_total'] = 100000;
        $booking = $this->siteRepository->store($input);

        return redirect('/')->with('status', trans(''));
    }
    
    public function getStylist(Request $request)
    {
        $salon_id = $request->salon_id;
        $users = $this->siteRepository->getStylist($salon_id);
        $view = view('sites.choose_stylist', compact('users'))->render();

        return response()->json(['html' => $view]);
    }

    public function getTimesheet(Request $request)
    {
        $stylist_id = $request->stylist_id;
        $timeSheet = $this->siteRepository->getTimeSheet($stylist_id);
        $view = view('sites.choose_timesheet', compact('timeSheet'))->render();

        return response()->json(['html' => $view]);
    }
}
