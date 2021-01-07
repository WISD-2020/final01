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
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



#修改會員資料頁面
Route::get('/user/change',[\App\Http\Controllers\UserController::class,'edit'])->name('user.change');
#更新會員資料
Route::patch('/user/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');

#瀏覽點餐紀錄頁面
Route::get('/order/{id}',[\App\Http\Controllers\OrderController::class,'index'])->name('order.index');

#後台根路由
Route::get('/manage',[\App\Http\Controllers\ManageController::class,'index'])->name('manage.index');

#登出
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');

#Clean Blog樣板套用測試
Route::get('posts',[\App\Http\Controllers\PostsController::class,'index'])->name('posts.index');
Route::get('post',[\App\Http\Controllers\PostsController::class,'show'])->name('posts.show');
Route::get('about',[\App\Http\Controllers\PostsController::class,'about'])->name('posts.about');
Route::get('contact',[\App\Http\Controllers\PostsController::class,'contact'])->name('posts.contact');
