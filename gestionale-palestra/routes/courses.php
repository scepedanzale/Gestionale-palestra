<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;


Route::resource('/courses', CourseController::class)->middleware('auth');

Route::resource('/bookings', CourseUserController::class)->middleware('auth');
