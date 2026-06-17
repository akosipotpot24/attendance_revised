<?php
use App\Http\Controllers\CrudController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\admin;
use App\Http\Middleware\scan;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::get('/project', function () {
    return view('crud.index');
 })->name('attendance');

Route::get('/welcome', function () {
    $teachers = Student::where('school_role','faculty')->count();
    $students = Student::where('school_role','student')->count();
    $workers = Student::where('school_role','non-teaching')->count();

    return view('crud.welcome',compact('teachers','students','workers') );
})->middleware('authenticate');



Route::get('/userRegister', function () {
    return view('crud.userRegister');
});


Route::get('/3', function () {
    return view('attendance.index');
});
Route::get('/scan', function () {
    return view('attendance.attendance');
});


Route::get('/register-attendance', function () {
    return view('attendance.register');
});


Route::get('/register-crud',[CrudController::class, 'newUser']);

Route::get('/scan/{id_number}', [CrudController::class, 'scan']);



Route::post('/login',[CrudController::class, 'login']);
Route::delete('/logout',[CrudController::class, 'logout']);
Route::post('/userRegister',[CrudController::class, 'userRegister']);

//patrons
Route::get('/records',[CrudController::class, 'records']);
Route::post('/register',[CrudController::class, 'register']);
Route::get('/viewStudents',[CrudController::class, 'viewstudents'])->name('studyante')->middleware('authenticate');
Route::get('/crud/edit/{id_number}', [CrudController::class, 'edit'])->middleware('admin');
Route::put('/crud/update/{id_number}', [CrudController::class, 'update']);
Route::delete('/crud/delete/{id_number}', [CrudController::class, 'destroy']);

Route::get('/faculty', function () {
    $teachers = Student::where('school_role','faculty')->get();
    return view('crud.faculty', compact('teachers'));
})->name('faculty');
Route::get('/student', function () {
    $students = Student::where('school_role','student')->get();
    return view('crud.students', compact('students'));
})->name('student');
Route::get('/worker', function () {
    $workers= Student::where('school_role','non-teaching')->get();
    return view('crud.nonTeaching', compact('workers'));
})->name('worker');



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
Route::get('/library-visits', [CrudController::class, 'libraryVisits'])->middleware('admin');

//users
Route::get('/forgot-password', [UserController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [UserController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');

//reset password
Route::get('/password_reset', function () {
    return view('users.password');
})->name('reset_password')->middleware('auth');

Route::middleware('auth')->group(function () {
   Route::patch('/password/reset',[UserController::class, 'password_reset']);
});


//statistics
Route::get('/statistics', function () {
    return view('stats.index');
})->name('statistics')->middleware('admin');

Route::get('/Getstatistics',[StatisticController::class, 'GetResults'])->name('check_statistics');



