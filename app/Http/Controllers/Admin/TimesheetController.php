<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\TimeSheetStylist;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheets = TimeSheetStylist::all();

        return view('stylists.index',compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timesheets = TimeSheetStylist::all();
        foreach ($timesheets as $timesheet) {
            if(Auth::user()->id == $timesheet->stylist_id){
                return redirect('admin/stylists')->with('status', trans('main.addtimesheetsuccessful'));
            }        
        }

        return view('stylists.add_timesheet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timesheet = new TimeSheetStylist;
        $timesheet = $timesheet->create([
            'stylist_id' => Auth::user()->id,
            'mon' => $request['mon'],
            'tues' => $request['tues'],
            'wed' => $request['wed'],
            'thur' => $request['thur'],
            'fri' => $request['fri'],
            'sat' => $request['sat'],
            'sun' => $request['sun']

        ]);

        $timesheet->save();

        return redirect('admin/stylists')->with('status', trans('main.addtimesheetsuccessful'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $timesheet = TimeSheetStylist::findOrFail($id);

            return view('stylists.add_timesheet', compact('timesheet'));

        } catch (ModelNotFoundException $e) {
            abort(404);
        }

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
        try {
            $timesheet = TimeSheetStylist::findOrFail($id);
            $timesheet->update($request->all());
            $timesheet->save();

            return redirect(action('Admin\TimesheetController@edit', $timesheet->id))->with('status', trans('main.timesheet_edited'));
                
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
