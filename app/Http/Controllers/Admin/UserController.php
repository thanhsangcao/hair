<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Salon;
use App\Http\Requests\UserFormRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(config('model.pagination'));

        if ($request->ajax()) {
            return view('admin.user.load', ['users' => $users])->render();  
        }

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
        $selectSalon = [];
        foreach($salons as $salon) {
            $selectSalon[ $salon->id ] = $salon->name;
        }

        $roles = Role::all();
        $selectRole = [];
        foreach ($roles as $role) {
            $selectRole[ $role->id ] = $role->name;
        }

        return view('admin.user.create', compact('selectSalon', 'selectRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = User::create($request->all());
        $user->syncRoles($request->get('permission'));

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
            $selectSalon = [];
            foreach($salons as $salon) {
                $selectSalon[ $salon->id ] = $salon->name;
            }
            $selectedSalon = $user->salon->id;

            $roles = Role::all();
            $selectRole = [];
            foreach ($roles as $role) {
                $selectRole[ $role->id ] = $role->name;
            }
            $selectedRole = $user->roles()->pluck('id')->toArray();

            return view('admin.user.edit', compact('user', 'selectSalon', 'selectedSalon', 'selectRole', 'selectedRole'));

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

            $user->syncRoles($request->get('permission'));

            return redirect(route('users.edit', $user->id))->with('status', trans('admin.User_edit'));
                
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
