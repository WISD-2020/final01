<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');    #訂單編號
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('food_id');     #餐點編號
            $table->foreign('food_id')->references('id')->on('food');
            $table->integer('amount');                 #數量
            $table->integer('total');                  #總計
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
        Schema::dropIfExists('items');
    }
}
