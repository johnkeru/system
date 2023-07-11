<?php

namespace App\Models;

use App\Models\OrgList;
use App\Models\StudentInfo;
use App\Models\EmployeeInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrgData extends Model
{
    use HasFactory;
    protected $table = "org_data";
    protected $fillable = ['org_list_id','student_info_id','employee_info_id'];

    public function orgList()
    {
        return $this->belongsTo(OrgList::class, 'org_list_id', 'id');
    }

    public function studentInfo()
    {
        return $this->belongsTo(StudentInfo::class, 'student_info_id', 'id');
    }

    public function employeeInfo()
    {
        return $this->belongsTo(EmployeeInfo::class, 'employee_info_id', 'id');
    }
}
