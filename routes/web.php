<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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



Route::get('/user', [userController::class, 'index'])->name('user.index');
Route::get('/user/input', [userController::class, 'create']);
Route::post('/user/store', [userController::class, 'store'])->name('store.data');
Route::get('/user/view/{user_id}', [userController::class, 'show'])->name('user.view');
Route::get('/user/edit/{user_id}', [userController::class, 'edit'])->name('edit.user');
Route::patch('/user/update/{user_id}', [userController::class, 'update'])->name('update.user');
Route::delete('/user/delete/{user_id}', [userController::class, 'destroy'])->name('delete.user');
