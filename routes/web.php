<?php

use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;

Route::resource('volunteers', VolunteerController::class);
Route::resource('donations', DonationController::class);
Route::resource('events', EventController::class);

// Halaman depan
Route::get('/', function () {
    return redirect()->route('events.index');
});
