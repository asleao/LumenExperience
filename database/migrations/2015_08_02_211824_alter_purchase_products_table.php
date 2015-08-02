<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPurchaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_product', function (Blueprint $table) {
            $table->dropForeign('purchase_product_product_id_foreign');
            $table->dropColumn('product_id');
            $table->integer('stock_product_id')->unsigned();
            $table->foreign('stock_product_id')
                  ->references('id')->on('stock_products')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
