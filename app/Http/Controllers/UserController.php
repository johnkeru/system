<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        $roles = Role::all();

        return view('users.index', compact(['users','roles','permissions']));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)) {
            return redirect()->route('users.index'); 
        }

        $user->assignRole($request->role);

        return redirect()->route('users.index');
    }

    public function deleteRole(User $user, Role $role)
    {
        if($user->hasRole($role)) {
            $user->removeRole($role);
            return redirect()->route('users.index');
        }
        else{
            return redirect()->route('users.index');
        }
    }

    public function assignPermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)) {
            return redirect()->route('users.index');
        }
        $user->givePermissionTo($request->permission);

        return redirect()->route('users.index')->with('message', 'added');
    }

    public function deletePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return redirect()->route('users.index');
        }
        else{
            return redirect()->route('users.index');
        }
    }

    public function deleteUser(User $user, Role $role,Permission $permission, $id)
    {
        $user->removeRole($role);
        $user->revokePermissionTo($permission);
        $data = User::find($id);
        $data->delete();

        return redirect()->route('users.index');
    }
}
