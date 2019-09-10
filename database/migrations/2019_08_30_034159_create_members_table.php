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
        // 会员的基本信息
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->comment('会员id');
            $table->string('name',32)->comment('会员昵称');
            $table->char('pwd',60)->comment('会员密码');
            $table->string('profile',128)->comment('会员头像')->default('');
            // $table->tinyInteger('sex')->comment('会员性别: 0保密 1男 2女')->default($value = '0');
            $table->char('phone',11)->comment('手机号')->default('');
            $table->string('email',32)->comment('邮箱')->default('');
            // $table->tinyInteger('status')->comment('会员状态: 0未激活 1已激活')->default($value = '0');
            $table->timestamps();
        });
    }
}