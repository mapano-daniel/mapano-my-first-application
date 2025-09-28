<?php

use Illuminate\Support\Facades\Route; 
use App\Models\Job; 
use App\Http\Controllers\JobController;

Route::get('/', function () { 
    return view('home'); 
}); 
 
Route::resource('jobs', JobController::class);
