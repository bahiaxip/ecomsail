<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryImagesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_products', function (Blueprint $table) {
            $table->id();
            $table->string('path_root')->nullable(); //ruta raíz imagen 
            $table->string('path_tag')->nullable(); //parte de la ruta
            $table->string('file_name'); //nombre de imagen
            $table->string('file_ext'); //extensión de imagen
            $table->string('image'); //nombre imagen o icono (puede ser aleatorio y no coincidir con el file_name y file_ext)
            $table->string('thumb')->nullable(); //miniatura de imagen
            $table->string('description')->nullable();
            $table->integer('product_id');
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
        Schema::dropIfExists('images_products');
    }
}
