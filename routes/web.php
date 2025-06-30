<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoodController;

Route::get('/', function () {
    return view('register');
});

Route::get('/mood_table', function () {
    return view('mood_table');
});




Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/mood_table',[MoodController::class, 'index'], function () {
        return view('mood_table');
    })->name('index');

    


    Route::delete('/delete/{mood}', [MoodController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/restore', [MoodController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [MoodController::class, 'forceDelete'])->name('forceDelete');
    
Route::get('/edit/{mood}', [App\Http\Controllers\MoodController::class, 'edit'])->name('edit');


Route::put('/moods/{mood}', [App\Http\Controllers\MoodController::class, 'update'])->name('update');





    
    Route::post('/submit-mood', [MoodController::class, 'add'])->name('add');
    
    Route::delete('/mood/{mood}', [MoodController::class, 'destroy'])->name('mood.destroy');
   


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});





