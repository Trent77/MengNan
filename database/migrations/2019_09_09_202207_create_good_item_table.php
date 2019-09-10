<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('good_id')->comment('商品id');
            $table->integer('spec_id')->comment('属性id');
            $table->integer('item_id')->comment('属性值id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_item');
    }
}
