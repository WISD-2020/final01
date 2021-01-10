<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();                                  #餐點編號
            $table->string('name');                 #餐點名稱
            $table->integer('price');               #價格
            $table->boolean('is_selling');          #是否上架
            $table->boolean('is_hot');              #是否暢銷
            $table->string('image')->nullable();    #圖片
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
        Schema::dropIfExists('food');
    }
}
