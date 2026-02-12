<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcom3');
});


Route::get('/2', function () {
    return view('crud/index');
});
