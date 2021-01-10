<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();                                    #留言編號
            $table->string('user_id');                #使用者名稱
            $table->foreign('user_id')->references('name')->on('users');
            $table->dateTime('date');                 #日期
            $table->text('title');                    #標題
            $table->text('content');                  #內容
            $table->boolean('is_major')->nullable();  #是否為重要客戶
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
        Schema::dropIfExists('comments');
    }
}
