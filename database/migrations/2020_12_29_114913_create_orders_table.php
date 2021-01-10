<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();                                      #訂單編號
            $table->string('user_id');                  #使用者名稱
            $table->foreign('user_id')->references('name')->on('users');
            $table->date('date');                       #日期
            $table->time('time');                       #時間
            $table->boolean('is_discount');             #是否有折扣
            $table->integer('last_price');              #折扣後總計
            $table->boolean('us_check');                #使用者管理
            $table->boolean('ma_check');                #管理者確認
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
