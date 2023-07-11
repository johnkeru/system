<?php

namespace App\Http\Controllers;

use App\Models\OrgData;
use App\Models\StudentInfo;
use App\Models\EmployeeInfo;
use Illuminate\Http\Request;
use App\Models\GenerateDocument;
use App\Models\TrackDocument;
use Illuminate\Support\Facades\DB;

class TrackDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $superAdmin = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $studentData = StudentInfo::where('email', $user->email)->first();
        $employeeData = EmployeeInfo::where('email', $user->email)->first();
        if($studentData != NULL)
        {//student
            $orgId = OrgData::where('student_info_id', $studentData->id)->pluck('id')->first();
        }
        elseif($superAdmin->role_id == '1')
        {
            //none
        }
        else
        {
            $orgId = OrgData::where('employee_info_id', $employeeData->id)->pluck('id')->first();
        }
 
        $search = $request['search'] ?? "";
        if ($search != "") {
            $docs = GenerateDocument::where('file_name', 'LIKE', "%".$search."%")->paginate(15);
        } elseif($superAdmin->role_id == '1')
        {
            $docs = GenerateDocument::paginate(15);
        } else {
            $docs = GenerateDocument::where('org_data_id', $orgId)->paginate(15);
        }
        
        return view('files.track_document.index',compact(['docs']));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
