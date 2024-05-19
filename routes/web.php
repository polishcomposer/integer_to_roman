<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
Route::get('/', function () {
    return view('welcome');
});
Route::post('/convert-int', [Controller::class, 'convertInt']);
Route::post('/convert-roman', [Controller::class, 'convertRoman']);
