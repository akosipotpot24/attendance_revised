<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
    'id_number',
    'student_name',
    'library_location',
    'attendance_date',
    'grade_level',
    'status',
    'created_at'
    
];
}
