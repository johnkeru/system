<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\EmployeeInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class EmployeeInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = EmployeeInfo::all();

        return view('setup.index', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeInfo::create([
            'email'=>$request->email,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
        ]);

        $user = User::create([
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);
        
        UserInfo::create([
            'user_id'=>$user->id
        ]);

        $user->assignRole('adviser');

        return redirect()->route('setup.index');
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
        $employeeInfo = EmployeeInfo::find($id)->first('email');
        $user = User::where('email', $employeeInfo->email)->first('id'); 
        User::find($user->id)->update(array(
            'email'=>$request->email,
        ));

        EmployeeInfo::find($id)->update(array(
            'email'=>$request->email,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
        ));

        return redirect()->route('setup.index');
    }

    public function changePass(Request $request, $id)
    {
        $employeeInfo = EmployeeInfo::find($id)->first('email');
        $user = User::where('email', $employeeInfo->email)->first('id'); 
        User::find($user->id)->update(array(
            'password'=>Hash::make($request->password),
        ));

        EmployeeInfo::find($id)->update(array(
            'password'=>Hash::make($request->password),
        ));

        return redirect()->route('setup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeInfo = EmployeeInfo::find($id)->first('email');
        $user = User::where('email', $employeeInfo->email)->first('id');
        User::find($user->id)->delete();
        EmployeeInfo::find($id)->delete();

        return redirect()->route('setup.index');
    }
}
