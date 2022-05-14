<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('amount');
            $table->string('address');
            $table->string('cus_city');
            $table->string('cus_country');
            $table->string('cus_postcode');
            $table->string('addressStatus')->nullable();
            $table->longText('note');
            $table->string('ship_name')->nullable();
            $table->string('ship_email')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_country')->nullable();
            $table->string('ship_postcode')->nullable();
            $table->string('status');
            $table->string('payment_type');
            $table->string('transaction_id');
            $table->string('currency');
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
        Schema::dropIfExists('orders');
    }
}
