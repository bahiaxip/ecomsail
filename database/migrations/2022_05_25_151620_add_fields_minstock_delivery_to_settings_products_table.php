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
            $table->integer('not_minstock')->after('product_state')->default(0);
            $table->integer('email_minstock')->default(0)->after('not_minstock');
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
