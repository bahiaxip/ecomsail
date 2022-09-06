<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('list_ids');
            $table->string('parent_attr');
            $table->integer('amount');
            $table->integer('product_id');
            $table->integer('stock')->default(0);
            $table->decimal('added_price',11,2)->default('0.00');
            $table->decimal('final_price',11,2)->default('0.00');            
            $table->integer('checked')->default(0);
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
        Schema::dropIfExists('combinations');
    }
}
