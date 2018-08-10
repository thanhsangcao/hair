<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\TimeSheetStylist;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use Auth;


class ManageTimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $time_sheets=TimeSheetStylist::paginate(config('model.pagination'));

        if ($request->ajax()) {
            return view('admin.stylists.load', ['time_sheets' => $time_sheets])->render();  
        }

        return view('admin.stylists.index',compact('time_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

            return redirect(action('Admin\ManageTimesheetController@edit', $timesheet->id))->with('status', trans('main.timesheet_edited'));
                
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
