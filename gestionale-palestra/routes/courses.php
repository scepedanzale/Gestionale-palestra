<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\UserController;


Route::resource('/courses', CourseController::class)->middleware('auth');

Route::resource('/bookings', CourseUserController::class)->middleware('auth');

Route::resource('/users', UserController::class)->middleware('auth');
