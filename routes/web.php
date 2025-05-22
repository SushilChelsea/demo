<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

Route::get('/', function () {
    return view('home');
});

Route::get('/create', function () {
    return view('create');
});

Route::post('/card', [CardController::class, 'submit'])->name('card.submit');
