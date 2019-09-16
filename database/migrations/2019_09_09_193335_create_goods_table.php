<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< Updated upstream:database/migrations/2019_09_09_193335_create_goods_table.php
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soft_id')->comment('分类id');
            $table->string('name',32)->comment('商品名字');
        });
=======
        //商品基本信息
      Schema::create('goods', function (Blueprint $table) {
        $table->increments('id')->comment('商品id 唯一');
        $table->integer('soft_id')->comment('分类id');
        $table->integer('brand_id')->comment('品牌id');
        $table->string('name',32)->comment('商品名字');
        $table->timestamps();
      });
>>>>>>> Stashed changes:database/migrations/2019_09_03_034015_create_goods_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
