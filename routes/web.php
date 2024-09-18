<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/list', [TodoController::class, 'index'])->name('todo.index');
Route::post('/list', [TodoController::class, 'store'])->name('todo.store');
Route::get('/list/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/list/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/list/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
