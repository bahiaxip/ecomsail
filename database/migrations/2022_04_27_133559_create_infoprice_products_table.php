<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfopriceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoprice_products', function (Blueprint $table) {
            $table->id();
            $table->integer('type_tax')->default(0);
            $table->integer('tax')->default(21);
            $table->decimal('partial_price')->nullable();
            $table->integer('discount_type')->default(0);
            $table->integer('discount')->default(15);
            $table->date('init_discount')->nullable();
            $table->date('end_discount')->nullable();
            $table->text('aditional_detail')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infoprice_products');
    }
}
