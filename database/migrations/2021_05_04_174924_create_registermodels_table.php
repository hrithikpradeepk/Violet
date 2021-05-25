<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registermodels', function (Blueprint $table) {
            $table->id("id");
            $table->string("Name");
            $table->string("Email") ->unique(); 
            $table->string("Phonenum") ->unique();
            $table->string("State");
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
        Schema::dropIfExists('registermodels');
    }
}
