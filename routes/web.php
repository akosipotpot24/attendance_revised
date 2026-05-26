<?php
use App\Http\Controllers\CrudController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\admin;
use App\Http\Middleware\scan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('crud/index');
});

Route::get('/welcome', function () {
    return view('crud/welcome');
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


Route::get('/register-crud',[CrudController::class, 'newUser']);

Route::get('/scan/{id_number}', [CrudController::class, 'scan']);



Route::post('/login',[CrudController::class, 'login']);
Route::delete('/logout',[CrudController::class, 'logout']);
Route::post('/userRegister',[CrudController::class, 'userRegister']);

Route::get('/records',[CrudController::class, 'records']);

Route::post('/register',[CrudController::class, 'register']);
Route::get('/viewStudents',[CrudController::class, 'viewstudents'])->middleware('authenticate');
Route::get('/crud/edit/{id_number}', [CrudController::class, 'edit'])->middleware('admin');
Route::put('/crud/update/{id_number}', [CrudController::class, 'update']);
Route::delete('/crud/delete/{id_number}', [CrudController::class, 'destroy']);


// section
Route::get('/sections', [SectionController::class, 'viewSections'])->middleware('admin');
Route::get('/sections/create', [SectionController::class, 'createSection'])->middleware('admin');
Route::post('/sections', [SectionController::class, 'storeSection']);
Route::get('/sections/{id}/edit', [SectionController::class, 'editSection']);
Route::put('/sections/{id}', [SectionController::class, 'updateSection']);
Route::delete('/sections/{id}', [SectionController::class, 'destroySection']);


//user approvals
Route::get('/users', [UserController::class, 'viewUsers'])->middleware('admin');
Route::get('/users/approval', [UserController::class, 'viewAprrovals'])->middleware('admin');
Route::get('/users/edit/{id}',  [UserController::class, 'edit'])->middleware('admin');
Route::put('/users/update/{id}',  [UserController::class, 'update'])->middleware('admin');
Route::put('/user/approve/{id}', [UserController::class, 'approveUser']);
Route::put('/user/decline/{id}', [UserController::class, 'declineUser']);


Route::get('/24', [SectionController::class, 'scanning'])->middleware('admin');

Route::get('/library-visits', [CrudController::class, 'libraryVisits'])->middleware('admin');

//users
