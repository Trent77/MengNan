<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< Updated upstream:database/migrations/2019_09_09_193736_create_items_table.php
         Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spec_id')->comment('属性id');
            $table->string('name')->comment('属性值名字');
        });
=======
        Schema::create('items', function (Blueprint $table) {
        $table->increments('id')->comment('规格内容id 唯一');
        $table->integer('spec_id')->comment('规格id');
        $table->string('name')->comment('规格具体内容');
        $table->timestamps();
      });
>>>>>>> Stashed changes:database/migrations/2019_09_03_034203_create_items_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
