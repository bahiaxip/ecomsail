<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_orders_items', function (Blueprint $table) {
            $table->id();            
            $table->text('combinations')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('state_discount')->default(0);
            $table->date('end_discount')->nullable();
            $table->decimal('price_unit');
            $table->decimal('total');
            $table->string('title');
            $table->string('path_tag');
            $table->string('image');
            $table->integer('user_id');            
            $table->integer('product_id');
            $table->integer('order_id');
            $table->integer('order_item_id');
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
        Schema::dropIfExists('history_orders_items');
    }
}
