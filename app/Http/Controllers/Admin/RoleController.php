<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use function React\Promise\reduce;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('admin.roles.index', compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create([
            'name'=>$request->role,
        ]);

        return redirect()->route('roles.index');
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
        $data = Role::find($id);
        $data->where('id', $id)->update(array(
        'name'=>$request->role,
        ));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('roles.index');
    }

    public function assignPermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)) {
            return redirect()->route('roles.index');
        }
        $role->givePermissionTo($request->permission);

        return redirect()->route('roles.index')->with('message', 'added');
    }

    public function deletePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return redirect()->route('roles.index');
        }
        else{
            return redirect()->route('roles.index');
        }
    }
}
