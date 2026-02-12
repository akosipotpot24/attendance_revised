<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcom3');
});


Route::get('/2', function () {
    return view('crud/index');
});


Route::get('/3', function () {
    return view('attendance/index');
});
Route::get('/register-attendance', function () {
    return view('attendance/register');
});
Route::get('/register-crud', function () {
    return view('crud/register');
});