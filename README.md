# 系統畫面 

## 前台

### 首頁 
##### — 瀏覽餐點資訊及點餐
![Imgur](https://i.imgur.com/2ibc5TK.jpg)  
- - -

### 購物車 
##### — 查看購物車內的餐點，可刪除餐點及結帳
![Imgur](https://i.imgur.com/VA4QSYV.jpg)
- - -

### 結帳 
##### — 確認餐點及會員資料無誤
![Imgur](https://i.imgur.com/VHEpMGh.jpg)
- - -

### 點餐紀錄 
##### — 查詢過去點餐紀錄及其明細
![Imgur](https://i.imgur.com/rGUdujP.jpg)
- - -

## 後台

### 所有餐點 
##### — 查看目前所有餐點，可新增、編輯及刪除餐點
![Imgur](https://i.imgur.com/ZkPP6eL.jpg)
- - -

### 目前訂單 
##### — 查看目前所有訂單，可送出訂單及查看其明細
![Imgur](https://i.imgur.com/gZ1bRJO.jpg)
- - -

### 顧客回報 
##### — 查看所有會員的抱怨訊息或遇到的問題
![Imgur](https://i.imgur.com/cUCjj5R.jpg)
- - -

# 系統名稱及作用
 
## 外送點餐系統
 * 顧客可以選擇餐點、數量進行點餐
 * 顧客可以寄抱怨、回饋信件
 * 顧客在確認餐點無誤後，可以按下結帳進行確認
 * 管理者可以上、下架餐點
 * 管理者可以看到目前的訂單和細項
 * 管理者可以確認訂單狀態及確認餐點已完成送出
 * 管理者可以查看顧客的抱怨、回饋信件


# 系統的主要功能 

## 前台 — [3A732053 林裕倫](https://github.com/3A732053)
 * 首頁 | `Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\FoodController::class,'index'])->name('dashboard');
 * 購物車 | `Route::get('/cart/index',[\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
 * 點餐紀錄 | `Route::get('/order/history',[\App\Http\Controllers\OrderController::class,'index'])->name('order.history');
 * 修改會員資料 | `Route::get('/user/change',[\App\Http\Controllers\UserController::class,'edit'])->name('user.change');
 * 問題回報 | `Route::get('/user/question',[\App\Http\Controllers\CommentsController::class,'index'])->name('user.question');
 * 登出 | `Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');
- - -
## 後台 — [3A732077 沈毓頡](https://github.com/3A732077)
 * 主控台 | `Route::get('/', [\App\Http\Controllers\ManageDashboardController::class, 'index'])->name('manage.dashboard.index');
 * 所有餐點 | `Route::get('food',[\App\Http\Controllers\ManageFoodController::class,'index'])->name('manage.food.index');
    * 新增餐點 | `Route::get('food/create',[\App\Http\Controllers\ManageFoodController::class,'create'])->name('manage.food.create');
    * 編輯餐點 | `Route::get('food/{id}/edit',[\App\Http\Controllers\ManageFoodController::class,'edit'])->name('manage.food.edit');
    * 刪除餐點 | `Route::delete('food/{id}',[\App\Http\Controllers\ManageFoodController::class,'destroy'])->name('manage.food.destroy');
 * 目前訂單 | `Route::get('order',[\App\Http\Controllers\ManageOrderController::class,'index'])->name('manage.order.index');
    * 查看明細 | `Route::get('order/{id}',[\App\Http\Controllers\ManageOrderController::class,'edit'])->name('manage.order.edit');
    * 送出訂單 | `Route::delete('order/{id}',[\App\Http\Controllers\ManageOrderController::class,'destroy'])->name('manage.order.destroy');
 * 顧客回報 | `Route::get('comment', [\App\Http\Controllers\ManageCommentController::class, 'index'])->name('manage.comment.index');

```
#前台
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
```

## ERD
![Imgur](https://i.imgur.com/KWfZIq4.png)
## 關聯式綱要圖
![Imgur](https://i.imgur.com/4WlzBgf.png)
## 資料表欄位設計
![Imgur](https://i.imgur.com/6Q26GhF.jpg)
- - -
![Imgur](https://i.imgur.com/1bJOucE.jpg)
- - -
![Imgur](https://i.imgur.com/cpgFTcF.jpg)
- - -
![Imgur](https://i.imgur.com/Py0d5Fb.jpg)
- - -
![Imgur](https://i.imgur.com/m5qGZsz.jpg)
- - -
![Imgur](https://i.imgur.com/KYwH7UJ.jpg)
- - -
![Imgur](https://i.imgur.com/BAUxF2t.jpg)
- - -

# 初始專案與DB負責的同學 
 * 初始專案、資料庫建立 — [3A732053 林裕倫](https://github.com/3A732053)
 * 資料庫關聯 — [3A732077 沈毓頡](https://github.com/3A732077)
 
# 額外使用的套件或樣板 
 * 前台樣板 — 使用極簡風格的[Clean Blog](https://startbootstrap.com/theme/clean-blog)
 * 使用套件：
     * doctrine/dbal — 修改資料庫欄位

# 系統測試資料存放位置 
##### 本專案資料夾final01底下的final01.sql

#系統復原
##### 1.複製在Github的專案 https://github.com/WISD-2020/final01.git ，打開Cmder，在www底下輸入：
    git clone https://github.com/WISD-2020/final01.git 
    
##### 2.進入專案資料夾
    cd final01

##### 3.復原專案三步驟
    composer install
    composer run-script post-root-package-install
    composer run-script post-create-project-cmd

##### 4.打開專案的.env檔案，修改資料庫IP、Port、名稱、密碼及資料庫
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=33060
    DB_DATABASE=final01
    DB_USERNAME=root
    DB_PASSWORD=root

##### 5.登入Adminer，在Admin內匯入final01專案的final01.sql
    資料庫系統：MySQL
    伺服器：localhost:33060
    帳號：root
    密碼：root
    
##### 6.修改UwAmp的Document Root
    {DOCUMENTPATH}/final01/public

# 系統使用者測試帳號

## 前台
##### 會員
    帳號：member@gmail.com
    密碼：00000000

## 後台
##### 管理者
    帳號：admin@gmail.com
    密碼：00000000

# 系統開發人員與工作分配 

## 前台 — [3A732053 林裕倫](https://github.com/3A732053)
    ．首頁
    ．購物車
    ．點餐紀錄
    ．修改會員資料
    ．問題回報
    ．登出
    
    ．README編寫
 
## 後台 — [3A732077 沈毓頡](https://github.com/3A732077)
    ．主控台
    ．所有餐點 
    ．目前訂單
    ．顧客回報 
