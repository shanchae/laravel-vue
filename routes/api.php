<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\UserController;

Route::apiResource('events', EventController::class);
Route::apiResource('venues', VenueController::class);
Route::apiResource('attendees', AttendeeController::class);
Route::apiResource('users', UserController::class);

