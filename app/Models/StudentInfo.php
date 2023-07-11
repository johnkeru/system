<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;
    protected $table = "student_info";
    protected $fillable = ['email','first_name','middle_name','last_name','course','organization'];
}