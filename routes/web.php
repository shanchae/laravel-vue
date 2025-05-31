<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('App'));
Route::get('/test', fn () => Inertia::render('Test'))->name('test');
// Add more routes as needed