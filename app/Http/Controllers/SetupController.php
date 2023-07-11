<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Author;
use App\Models\EmployeeInfo;
use App\Models\OrgData;
use App\Models\OrgList;
use App\Models\StudentInfo;
use App\Models\Writer;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function index()
    {
        $employees = EmployeeInfo::all();
        $orgLists = OrgList::all();
        $students = StudentInfo::all();
        $orgDatas = OrgData::all();
        return view('setup.index', compact('students','orgLists','employees','orgDatas'));
    }

    
}
