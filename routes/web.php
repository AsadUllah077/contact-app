<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PersonController::class)->prefix('person')->name('person.')->middleware('auth')->group(function(){
   Route::get('/', 'index')->name('index');
   Route::get('/create', 'create')->name('create');
   Route::post('/create', 'store')->name('store');
   Route::get('/{person}/edit', 'edit')->name('edit');
   Route::get('/{person}/show', 'show')->name('show');
   Route::put('/{person}/edit', 'update')->name('update');
   Route::get('/{person}/destroy', 'destroy')->name('destroy');
});

Route::controller(BusinessController::class)->prefix('business')->name('business.')->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{business}/edit', 'edit')->name('edit');
    Route::get('/{business}/show', 'show')->name('show');
    Route::put('/{business}/edit', 'update')->name('update');
    Route::get('/{business}/destroy', 'destroy')->name('destroy');
 });

 Route::controller(TaskController::class)->prefix('task')->name('task.')->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{task}/edit', 'update')->name('edit');
    Route::get('/{task}/show', 'show')->name('show');
    // Route::put('/{task}/edit', 'update')->name('update');
    Route::get('/{task}/destroy', 'destroy')->name('destroy');
 });

require __DIR__.'/auth.php';
