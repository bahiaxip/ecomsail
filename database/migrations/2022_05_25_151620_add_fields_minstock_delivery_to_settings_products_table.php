<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsMinstockDeliveryToSettingsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings_products', function (Blueprint $table) {
            $table->enum('not_minstock',["true","false"])->after('product_state')->default("false");
            $table->enum('email_minstock',["true","false"])->after('not_minstock')->default("false");
            $table->integer('minstock')->after('email_minstock')->nullable();
            $table->integer('delivery_time')->default(0)->after('minstock');
            $table->integer('custom_delivery')->after('delivery_time')->nullable();
            $table->decimal('amount_delivery')->after('custom_delivery')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings_products', function (Blueprint $table) {
            //
        });
    }
}
