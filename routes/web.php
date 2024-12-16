<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', [ItemController::class, 'create'])->name('create');

Route::post('/create', [ItemController::class, 'store'])->name('items.store');

Route::put('/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/update/{id}', [ItemController::class, 'update'])->name('items.update');

Route::delete('/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');