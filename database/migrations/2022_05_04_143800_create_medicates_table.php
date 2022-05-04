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
        Schema::create('medicates', function (Blueprint $table) {
            $table->id();
            $table->string('m_no', 11);
            $table->integer('quantity');
            $table->integer('price');
            $table->date('date');
            $table->unsignedBigInteger('p_id');
            $table->unsignedBigInteger('c_id');
            $table->foreign('c_id')->references('id')->on('cases');
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
        Schema::dropIfExists('medicates');
    }
};
