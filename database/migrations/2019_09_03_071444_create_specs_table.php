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
<<<<<<< Updated upstream:database/migrations/2019_09_09_193635_create_specs_table.php
        Schema::create('specs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->comment('属性名字');
            $table->integer('soft_id')->comment('分类id');
        });
=======
      Schema::create('specs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',32);
          $table->integer('soft_id')->comment('分类id');
          $table->timestamps();
      });
>>>>>>> Stashed changes:database/migrations/2019_09_03_071444_create_specs_table.php
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
