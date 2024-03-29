<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_products', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->string('title')->nullable();
            $table->integer('feedback')->nullable();
            $table->text('description')->nullable();
            $table->integer('product_id');
            //establecido nullable() para los seeders
            $table->integer('order_id')->nullable();
            $table->integer('order_item_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('feedback_products');
    }
}
