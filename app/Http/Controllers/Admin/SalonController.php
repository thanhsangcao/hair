<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salons = DB::table('salons')->paginate(config('model.pagination'));

        if ($request->ajax()) {
            return view('admin.salon.load', ['salons' => $salons])->render();  
        }

        return view('admin.salon.index', compact('salons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salon = new Salon;
        $salon = $salon->create($request->all());
        $salon->save();

        return redirect('/admin/salons')->with('status', trans('admin.Salon_create'));
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
            $salon = Salon::findOrFail($id);

            return view('admin.salon.edit', compact('salon'));

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
            $salon = Salon::findOrFail($id);
            $salon->update($request->all());
            $salon->save();

            return redirect(action('Admin\SalonController@edit', $salon->id))->with('status', trans('admin.Salon_edit'));
                
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
        $salon = Salon::destroy($id);

        return redirect('/admin/salons/')->with('status', trans('admin.Salon_delete'));
    }
}
