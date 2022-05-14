<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->longText('order_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('brand_name');
            $table->string('category_Name');
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->integer('product_price');
            $table->longText('review')->nullable();
            $table->integer('stars')->nullable();
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
        Schema::dropIfExists('orderdetails');
    }
}
