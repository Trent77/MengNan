<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->comment('标题');
            $table->string('auth',32)->comment('作者');
            $table->string('desc')->comment('文章描述');
            $table->integer('tid')->comment('文章类别id');
            $table->integer('cid')->comment('文章板块id');
            $table->string('thumb',128)->comment('缩略图')->default('');
            $table->integer('num')->comment('阅读量');
            $table->integer('goodnum')->comment('点赞数');
            $table->longText('content')->comment('内容');
            $table->dateTime('ctime')->comment('创建时间');
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
        Schema::dropIfExists('articles');
    }
}
