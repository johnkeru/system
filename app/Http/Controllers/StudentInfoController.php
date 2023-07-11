<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentInfo::all();

        return view('setup.index', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StudentInfo::create([
            'email'=>$request->email,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'course'=>$request->course,
        ]);

        $user = User::create([
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);
        
        UserInfo::create([
            'user_id'=>$user->id
        ]);

        $user->assignRole('student');

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

        $studentInfo = StudentInfo::find($id)->first('email');
        $user = User::where('email', $studentInfo->email)->first('id'); 
        User::find($user->id)->update(array(
            'email'=>$request->email,
        ));

        StudentInfo::find($id)->update(array(
            'email'=>$request->email,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'course'=>$request->course,
        ));
        return redirect()->route('setup.index');
    }

    public function changePass(Request $request, $id)
    {
        $studentInfo = StudentInfo::find($id)->first('email');
        $user = User::where('email', $studentInfo->email)->first('id'); 
        User::find($user->id)->update(array(
            'password'=>Hash::make($request->password),
        ));

        StudentInfo::find($id)->update(array(
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
        $studentInfo = StudentInfo::find($id)->first('email');
        $user = User::where('email', $studentInfo->email)->first('id');
        User::find($user->id)->delete();
        StudentInfo::find($id)->delete();
        
        return redirect()->route('setup.index');
    }
}
