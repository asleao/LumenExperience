<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                  ->references('id')->on('customers')
                  ->onDelete('cascade');
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')
                  ->references('id')->on('employees')
                  ->onDelete('cascade');
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')
                  ->references('id')->on('stocks')
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
