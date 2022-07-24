<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('status'); 
            $table->integer('type'); //type: 0 categoría padre, 1 categoría hijo
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('path_root')->nullable(); //ruta imagen o icono
            $table->string('path_tag')->nullable(); //parte de la ruta
            $table->string('file_name')->nullable(); //nombre de imagen
            $table->string('file_ext')->nullable(); //extensión de imagen
            $table->string('image')->nullable(); //nombre imagen o icono (puede ser aleatorio y no coincidir con el file_name y file_ext)
            $table->string('thumb')->nullable(); //miniatura de imagen o otro icono
            //mantenemos icon_hexcode. Sería necesario sustituir los métodos
            //pluck() por get([...]) para los selectsgit 
            $table->string('icon_hexcode')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
