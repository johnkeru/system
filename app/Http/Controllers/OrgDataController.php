<?php

namespace App\Http\Controllers;

use App\Models\EmployeeInfo;
use App\Models\OrgData;
use App\Models\OrgList;
use App\Models\StudentInfo;
use Illuminate\Http\Request;

class OrgDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgDatas = OrgData::all();

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
        OrgData::create([
            'org_list_id'=>$request->orglist,
            'student_info_id'=>$request->student,
            'employee_info_id'=>$request->employee,
        ]);

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
        $origData = OrgData::find($id);
        $newlist= "";
        $newstudent= "";
        $newemployee = "";

        $request->orglist == null ? $newlist=$origData->org_list_id : $newlist=$request->orglist;
        $request->student == null ? $newstudent=$origData->student_info_id : $newstudent=$request->student;
        $request->employee == null ? $newemployee=$origData->employee_info_id : $newemployee=$request->employee;

        OrgData::find($id)->update(array(
            'org_list_id'=>$newlist,
            'student_info_id'=>$newstudent,
            'employee_info_id'=>$newemployee,
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
        OrgData::find($id)->delete();

        return redirect()->route('setup.index');
    }
}
