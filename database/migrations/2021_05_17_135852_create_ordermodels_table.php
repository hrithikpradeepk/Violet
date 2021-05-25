<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermodels', function (Blueprint $table) {
            $table->id();
            $table->string("Productid");
            $table->string("Customerid");
            $table->string("Orderqty");
            $table->string("price");
            $table->string("total");
            $table->string("Orderdate");
            $table->string("Fname");
            $table->string("Lname");
            $table->string("Hname");
            $table->string("Email");
            $table->string("Phone");
            $table->string("City");
            $table->string("State");
            $table->string("Pincode");
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
        Schema::dropIfExists('ordermodels');
    }
}
