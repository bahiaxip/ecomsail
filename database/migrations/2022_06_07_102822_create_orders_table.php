<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('status')->default(0);
            $table->integer('order_type')->default(0);
            $table->string('order_num')->nullable();
            $table->text('order_comment')->nullable();
            $table->integer('order_state')->default(0);
            $table->integer('location')->nullable();
            $table->integer('selected_address')->nullable();
            $table->decimal('subtotal',11,2)->nullable();
            $table->decimal('total',11,2)->nullable();
            $table->integer('payment_method')->default(0);
            $table->text('payment_info')->nullable();
            $table->integer('quantity')->default(0);            
            $table->integer('user_id');
            $table->dateTime('paid_at')->nullable();
            $table->softDeletes();
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
