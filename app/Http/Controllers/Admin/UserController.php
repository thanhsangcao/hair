<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Salon;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('model.pagination'));
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salons = Salon::all();
        $select = [];
        foreach($salons as $salon) {
            $select[ $salon->id ] = $salon->name;
        }

        return view('admin.user.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'), 
            'phone_number' => request('phone_number'),  
            'address' => request('address'), 
            'permission' => request('permission'),
            'salon_id' => request('salon_id'), 
        ])->save();

        return redirect('/admin/users')->with('status', trans('admin.User_create'));
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
            $user = User::findOrFail($id);
            $salons = Salon::all();
            $select = [];
            foreach($salons as $salon) {
                $select[ $salon->id ] = $salon->name;
            }
            $selectedSalon = $user->salon->id;

            return view('admin.user.edit', compact('user', 'select', 'selectedSalon'));

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
            $user = User::findOrFail($id);
            $user->update($request->all());
            $user->save();

            return redirect(action('Admin\UserController@edit', $user->id))->with('status', trans('admin.User_edit'));
                
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
        $user = User::destroy($id);

        return redirect('/admin/users/')->with('status', trans('admin.User_delete'));
    }
}
