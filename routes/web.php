<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


Route::get('/', function () {
    return view('welcom3');
});


Route::get('/2', function () {
    return view('crud/index');
});

Route::get('/userRegister', function () {
    return view('crud/userRegister');
});



Route::get('/3', function () {
    return view('attendance/index');
});
Route::get('/scan', function () {
    return view('attendance/attendance');
});
Route::get('/register-attendance', function () {
    return view('attendance/register');
});
Route::get('/register-crud', function () {
    return view('crud/register');
});


Route::get('/scan/{student_number}', [CrudController::class, 'scan']);



Route::post('/login',[CrudController::class, 'login']);
Route::delete('/logout',[CrudController::class, 'logout']);
Route::post('/userRegister',[CrudController::class, 'userRegister']);

Route::post('/register',[CrudController::class, 'register']);
Route::get('/viewStudents',[CrudController::class, 'viewstudents']);
Route::get('/crud/edit/{student_number}', [CrudController::class, 'edit']);
Route::put('/crud/update/{student_number}', [CrudController::class, 'update']);
Route::delete('/crud/delete/{student_number}', [CrudController::class, 'destroy']);
