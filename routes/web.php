<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CardController;

Route::get('/', [CardController::class, 'index']);

Route::get('/create', function () {
    return view('create');
});

Route::post('/card', [CardController::class, 'submit'])->name('card.submit');
Route::get('/cards', [CardController::class, 'index'])->name('cards');
Route::get('/card/{id}/edit', [CardController::class, 'edit'])->name('card.edit');
Route::get('/card/{id}/view', [CardController::class, 'view'])->name('card.view');
Route::put('/card/{id}', [CardController::class, 'update'])->name('card.update');

Route::post('/ajax-submit', [AjaxController::class, 'submit'])->name('ajax.submit');
Route::post('/ajax-delete', [AjaxController::class, 'delete'])->name('ajax.delete');