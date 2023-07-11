<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    use HasFactory;
    protected $table = "employee_info";
    protected $fillable = ['email','first_name','middle_name','last_name'];
}
