<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServiceFormRequest;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::all();

        return view('admin.service.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceFormRequest $request)
    {
        $input = $request->all();
        $input['show'] = trans('admin.Default_value');
        $input['delete'] = trans('admin.Default_value');

        if($request->hasFile('image'))
        {
            $fileName = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('public/images', $fileName);
            $input['img'] = $fileName;
        }
        $service = Service::create($input);
        
        return redirect('/admin/services')->with('status', trans('admin.Service_create'));

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
            $service = Service::findOrFail($id);

            return view('admin.service.edit', compact('service'));

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
            $service = Service::findOrFail($id);
            $service->update($request->all());
            if($request->hasFile('image'))
            {
                $fileName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image')->storeAs('public/images', $fileName);
                $service->update(['img' => $fileName]);
            }

            return redirect(action('Admin\ServiceController@edit', $service->id))->with('status', trans('admin.Service_edit'));
                
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
        $service = Service::destroy($id);

        return redirect('/admin/services/')->with('status', trans('admin.Service_delete'));

    }

    public function select(Request $request)
    {
        $ids = $request->checkbox;
        foreach ($ids as $id) {
            $service = Service::findOrFail($id)->update(['show' => '1']);
        }
            $unSelected = Service::whereNotIn('id', $ids)->update(['show' => '0']);

        return back()->with('status', trans('Selected success!'));;
    }
}
