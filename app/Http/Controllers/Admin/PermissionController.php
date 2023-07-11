<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::create([
            'name'=>$request->permission
        ]);

        return redirect()->route('permissions.index');
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
        $data = Permission::find($id);
        $data->where('id', $id)->update(array(
        'name'=>$request->permission,
        ));

        return redirect()->route('permissions.index')->with('message', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permissions.index');
    }
    
    public function assignRole(Request $request, Permission $permission)
    {
        if($permission->hasRole($request->role)) {
            return redirect()->route('permissions.index'); 
            
        }

        $permission->assignRole($request->role);

        return redirect()->route('permissions.index');
    }

    public function deleteRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)) {
            $permission->removeRole($role);
            return redirect()->route('permissions.index');
        }
        else{
            return redirect()->route('permissions.index');
        }
    }
}
