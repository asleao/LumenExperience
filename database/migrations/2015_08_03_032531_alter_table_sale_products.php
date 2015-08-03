<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSaleProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_products', function (Blueprint $table) {
            $table->dropForeign('sale_products_product_id_foreign');
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
