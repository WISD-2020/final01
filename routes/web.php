<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



#修改會員資料頁面
Route::get('/user',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');

#更新會員資料
Route::patch('/user/{name}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');

