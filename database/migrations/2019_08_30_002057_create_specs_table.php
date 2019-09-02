<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //规格管理
      Schema::create('specs', function (Blueprint $table) {
        $table->increments('id')->comment('规格id 唯一');
        $table->integer('softs_id')->comment('分类id');
        $table->string('name',32)->comment('规格名');
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
        Schema::dropIfExists('specs');
    }
}
