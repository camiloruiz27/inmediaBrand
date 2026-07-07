<?php

use App\Http\Controllers\ContactLeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/contacto', [ContactLeadController::class, 'store'])->name('contact.store');
