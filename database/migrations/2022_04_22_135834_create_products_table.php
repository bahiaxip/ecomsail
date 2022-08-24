<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('status');            
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('state_discount')->default(0);
            $table->integer('discount')->nullable();
            $table->date('init_date_discount')->nullable();
            $table->date('end_date_discount')->nullable();
            $table->text('detail');
            $table->integer('sold')->default(0);
            $table->string('path_root')->nullable();
            $table->string('path_tag')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_ext')->nullable();
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->integer('code')->nullable();
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
        Schema::dropIfExists('products');
    }
}
