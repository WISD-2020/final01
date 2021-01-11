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

#首頁
Route::middleware(['auth:sanctum', 'verified'])->
get('/dashboard', [\App\Http\Controllers\FoodController::class,'index'])->name('dashboard');

#購物車頁面
Route::get('/user/cart',[\App\Http\Controllers\CartController::class,'index'])->name('user.cart');
#瀏覽點餐紀錄頁面
Route::get('/order/history',[\App\Http\Controllers\OrderController::class,'index'])->name('order.history');
#點餐詳細頁面
Route::get('/order/item/{id}',[\App\Http\Controllers\OrderController::class,'show'])->name('order.item');
#修改會員資料頁面
Route::get('/user/change',[\App\Http\Controllers\UserController::class,'edit'])->name('user.change');
#問題回報頁面
Route::get('/user/question',[\App\Http\Controllers\CommentsController::class,'index'])->name('user.question');
#登出
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');



#更新會員資料
Route::patch('/user/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
#問題送出
Route::post('/user/store',[\App\Http\Controllers\CommentsController::class,'store'])->name('user.store');





#Clean Blog樣板套用測試
Route::get('posts',[\App\Http\Controllers\PostsController::class,'index'])->name('posts.index');
Route::get('post',[\App\Http\Controllers\PostsController::class,'show'])->name('posts.show');
Route::get('about',[\App\Http\Controllers\PostsController::class,'about'])->name('posts.about');
Route::get('contact',[\App\Http\Controllers\PostsController::class,'contact'])->name('posts.contact');




#後台
Route::prefix('manage')->group(function () {
    Route::get('/', [\App\Http\Controllers\ManageDashboardController::class, 'index'])->name('manage.dashboard.index');
#菜單
    Route::get('food',[\App\Http\Controllers\FoodController::class,'index'])->name('manage.food.index');
    Route::get('food/create',[\App\Http\Controllers\FoodController::class,'create'])->name('manage.food.create');
    Route::get('food/{id}/edit',[\App\Http\Controllers\FoodController::class,'edit'])->name('manage.food.edit');

#點單
    Route::get('order',[\App\Http\Controllers\OrderController::class,'index'])->name('manage.order.index');
    Route::get('order/{id}/edit',[\App\Http\Controllers\OrderController::class,'edit'])->name('manage.order.edit');

#評論
    Route::get('comment', [\App\Http\Controllers\ManageCommentController::class, 'index'])->name('manage.comment.index');
});
