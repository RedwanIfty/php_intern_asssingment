<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task', [TaskController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/task/create',[TaskController::class,'create'])->name('create');
Route::post('/task/store',[TaskController::class,'store'])->name('store');
Route::get('/task/edit/{id}',[TaskController::class,'edit'])->name('edit');
Route::post('/task/update/{id}',[TaskController::class,'update'])->name('update');
Route::get('/change-status/{id}',[TaskController::class,'changeStatus'])->name('change-status');

Route::post('/task/destroy/{id}',[TaskController::class,'destroy'])->name('tasks.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
