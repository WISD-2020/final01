<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();                                 #購物車編號
            $table->string('user_id');             #使用者名稱
            $table->foreign('user_id')->references('name')->on('users');
            $table->unsignedBigInteger('food_id'); #餐點編號
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
            $table->integer('amount');             #數量
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
        Schema::dropIfExists('carts');
    }
}
