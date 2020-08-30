<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('isMethodPost', ['only' => ['edit','create','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(25);
        $permisions = Permission::all();
        $user = User::all();

        return view('Admin.Roles.index',compact('roles','permisions','user'));
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
        $this->validate($request , [
            'role' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);
        Role::create(['name' => $request->role]);
        return redirect(route('role.index'));
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


    public function edit(Request $request ,$id)
    {
//
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
        $this->validate($request, [
            'role_name' => 'required',
            'role_id' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->role_name;
        $role->save();

        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $role = Role::findOrFail($request->role_id);

        $role->delete();
        return redirect(route('role.index'));
    }
    /**
     * Custom Method Role
     *
     */

    public function roleAddToUser(Request $request){
        $this->validate($request , [
            'user_id' => 'required',
            'role' => 'required'
        ]);
        $user = User::find($request->user_id);
        if ($user->roles->count()<1){
            $user->assignRole($request->role);
            return redirect(route('allUsers'));
        }
        alert()->error('اخطار','هر کابر میتواند فقط یک نقش داشته باشد!')->persistent('OK');
        return redirect(route('allUsers'));
}


    public function roleDeleteToUser(Request $request){

        $user = User::find($request->user_id);
        $user->removeRole($request->role);
        return redirect(route('allUsers'));
    }


    public function AddPermissionsToRole(Request $request){

       $role = Role::find($request->role_id);
       $role->givePermissionTo($request->permission);
       return redirect(route('role.index'));
    }
    public function DeletePermissionsToRole(Request $request){

        $role = Role::find($request->role_id);
        $role->revokePermissionTo($request->permission);
        return redirect(route('role.index'));
    }
}
