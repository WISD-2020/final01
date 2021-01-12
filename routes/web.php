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

#餐點詳細頁面
Route::get('/food/show/{id}',[\App\Http\Controllers\FoodController::class,'show'])->name('food.show');
#購物車頁面
Route::get('/cart/index',[\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
#結帳頁面
Route::get('/cart/final',[\App\Http\Controllers\CartController::class,'final'])->name('cart.final');
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


#餐點加入購物車
Route::post('/cart/store',[\App\Http\Controllers\CartController::class,'store'])->name('cart.store');
#從購物車刪除餐點
Route::delete('/cart/destroy/{id}',[\App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');
#購物車送出訂單
Route::post('/cart/deliver',[\App\Http\Controllers\CartController::class,'deliver'])->name('cart.deliver');
#送出訂單
Route::get('/cart/clear',[\App\Http\Controllers\CartController::class,'clear'])->name('cart.clear');
#更新會員資料
Route::patch('/user/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
#問題送出
Route::post('/user/store',[\App\Http\Controllers\CommentsController::class,'store'])->name('user.store');









#後台
Route::prefix('manage')->group(function () {
    Route::get('/', [\App\Http\Controllers\ManageDashboardController::class, 'index'])->name('manage.dashboard.index');
#菜單
    Route::get('food',[\App\Http\Controllers\ManageFoodController::class,'index'])->name('manage.food.index');
    Route::get('food/create',[\App\Http\Controllers\ManageFoodController::class,'create'])->name('manage.food.create');
    Route::get('food/{id}/edit',[\App\Http\Controllers\ManageFoodController::class,'edit'])->name('manage.food.edit');
    Route::patch('food/{id}',[\App\Http\Controllers\ManageFoodController::class,'update'])->name('manage.food.update');
    Route::delete('food/{id}',[\App\Http\Controllers\ManageFoodController::class,'destroy'])->name('manage.food.destroy');
    Route::post('food/store',[\App\Http\Controllers\ManageFoodController::class,'store'])->name('manage.food.store');

#點單
    Route::get('order',[\App\Http\Controllers\ManageOrderController::class,'index'])->name('manage.order.index');
    Route::get('order/{id}',[\App\Http\Controllers\ManageOrderController::class,'edit'])->name('manage.order.edit');
    Route::delete('order/{id}',[\App\Http\Controllers\ManageOrderController::class,'destroy'])->name('manage.order.destroy');
#評論
    Route::get('comment', [\App\Http\Controllers\ManageCommentController::class, 'index'])->name('manage.comment.index');
#購物車
    Route::get('cart',[\App\Http\Controllers\ManageCartController::class,'index'])->name('manage.cart.index');
#明細
    Route::get('item',[\App\Http\Controllers\ManageItemController::class,'index'])->name('manage.item.index');

});
