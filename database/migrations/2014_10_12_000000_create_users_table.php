<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                              #編號
            $table->string('name')->unique();   #使用者名稱
            $table->boolean('sex');             #性別
            $table->date('birthday');           #生日
            $table->string('password');         #密碼
            $table->string('phone');            #電話
            $table->string('email')->unique();  #電子郵件
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('class');           #權限
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
