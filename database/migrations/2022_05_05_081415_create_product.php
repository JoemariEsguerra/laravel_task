<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id("Productid");
            $table->string("ProductCode");
            $table->string("ProductName");
            $table->string("Description");
            $table->integer("Price");
            $table->boolean("IsActive");
            $table->string("color");
            $table->string("size");
            $table->string("CategoryId");
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
        Schema::dropIfExists('product');
    }
}
