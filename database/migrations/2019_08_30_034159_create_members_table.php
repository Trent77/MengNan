<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->comment('用户id');
            $table->string('name',32)->comment('用户名');
            $table->char('pwd',60)->comment('用户密码');
            $table->string('profile',128)->comment('用户头像')->default('');
            $table->string('nickname',32)->comment('用户昵称')->default('');
            $table->tinyInteger('sex')->comment('用户性别: 0男 1女')->default($value = '0');
            $table->char('phone',11)->comment('用户手机号')->default('');
            $table->string('email',32)->comment('用户邮箱')->default('');
            $table->tinyInteger('status')->comment('用户状态: 0未激活 1已激活')->default($value = '0');
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
        Schema::dropIfExists('members');
    }
}
