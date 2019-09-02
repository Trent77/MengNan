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
      //商品基本信息
      Schema::create('goods', function (Blueprint $table) {
        $table->increments('id')->comment('商品id 唯一');
        $table->integer('softs_id')->comment('分类id');
        $table->integer('brands_id')->comment('品牌id');
        $table->string('specs_name',32)->comment('规格名字')->default('');
        $table->string('name',32)->comment('商品名字');
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
        Schema::dropIfExists('goods');
    }
}
