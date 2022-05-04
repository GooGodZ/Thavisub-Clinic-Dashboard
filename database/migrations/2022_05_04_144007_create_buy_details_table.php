<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_details', function (Blueprint $table) {
            $table->id();
            $table->string('bd_no', 11);
            $table->integer('quantity');
            $table->integer('price');
            $table->unsignedBigInteger('p_id');
            $table->foreign('p_id')->references('id')->on('products');
            $table->unsignedBigInteger('buy_id');
            $table->foreign('buy_id')->references('id')->on('buys');
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
        Schema::dropIfExists('buy_details');
    }
};
