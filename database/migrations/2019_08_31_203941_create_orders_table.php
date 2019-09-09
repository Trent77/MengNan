<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->comment('订单id');
            $table->string('number',100)->comment('订单编号');
            $table->string('addressee',32)->comment('收件人');
            $table->string('total_amount',32)->comment('总金额');
            $table->string('amount_payable',32)->comment('应付金额');
            $table->tinyInteger('order_status')->comment('订单状态 0 待确定 1 已确定')->default(0);
            $table->tinyInteger('payment_status')->comment('支付状态 0 未支付 1 已支付')->default(0);
            $table->tinyInteger('delivery_status')->comment('发货状态 0 未发货 1 已发货')->default(0);
            $table->string('payment_method',32)->comment('支付方式');
            $table->string('distribution mode',32)->comment('配送方式');
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
        Schema::dropIfExists('orders');
    }
}
