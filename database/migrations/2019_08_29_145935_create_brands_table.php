<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //品牌管理
        Schema::create('brands', function (Blueprint $table) {
          $table->increments('id')->comment('品牌ID 唯一');
          $table->integer('softs_id')->comment('分类ID');
          $table->string('name')->comment('品牌名字');
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
        Schema::dropIfExists('brands');
    }
}
