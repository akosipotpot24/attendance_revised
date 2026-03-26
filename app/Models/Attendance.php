<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
    'student_number',
    'student_name',
    'library_location',
    'attendance_date',
    'grade_level',
    'status'
    
];
}
