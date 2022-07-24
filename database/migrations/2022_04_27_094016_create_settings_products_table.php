<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
    availability: 1 -> Online y tienda, 2 -> solo online, 3 -> solo tienda
    */
    public function up()
    {
        Schema::create('settings_products', function (Blueprint $table) {
            $table->id();
            $table->integer('availability')->default(1); 
            $table->integer('product_state')->default(0);           
            $table->unsignedDecimal('long')->nullable();
            $table->unsignedDecimal('width')->nullable();
            $table->unsignedDecimal('height')->nullable();
            $table->unsignedDecimal('weight')->nullable();
            $table->string('type_show')->nullable();
            //archivo adicional
            $table->string('path_root')->nullable(); //ruta imagen o icono
            $table->string('path_tag')->nullable(); //parte de la ruta
            $table->string('file_name')->nullable(); //nombre de imagen
            $table->string('file_ext')->nullable(); //extensión de imagen
            $table->string('attachment_file')->nullable(); //nombre de archivo aleatorio
            $table->string('thumb')->nullable(); //miniatura de imagen
            

            //$table->text('aditional_detail')->nullable();
            //para integer también válido: integer(...)->unsigned();
            $table->unsignedBigInteger('product_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_products');
    }
}
