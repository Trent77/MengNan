<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('good_id')->comment('商品id');
            $table->string('key',128)->comment('规格id');
            $table->string('key_name',128)->comment('规格名字');
            $table->integer('store_s')->comment('实际库存');
            $table->integer('store_d')->comment('冻结库存');
            $table->integer('store_x')->comment('销售库存');
            $table->decimal('price', 8, 2)->comment('价格');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sku');
    }
}
