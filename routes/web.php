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
Route::get('/order',[\App\Http\Controllers\OrderController::class,'index'])->name('order.history');
#點餐詳細頁面
Route::get('/order/item/{id}',[\App\Http\Controllers\OrderController::class,'show'])->name('order.item');

#問題回報頁面
Route::get('/user/question',[\App\Http\Controllers\CommentsController::class,'index'])->name('user.question');
#問題送出
Route::post('/user/store',[\App\Http\Controllers\CommentsController::class,'store'])->name('user.store');

#後台根路由
Route::get('/manage',[\App\Http\Controllers\ManageController::class,'index'])->name('manage.index');

#登出
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');

#Clean Blog樣板套用測試
Route::get('posts',[\App\Http\Controllers\PostsController::class,'index'])->name('posts.index');
Route::get('post',[\App\Http\Controllers\PostsController::class,'show'])->name('posts.show');
Route::get('about',[\App\Http\Controllers\PostsController::class,'about'])->name('posts.about');
Route::get('contact',[\App\Http\Controllers\PostsController::class,'contact'])->name('posts.contact');
