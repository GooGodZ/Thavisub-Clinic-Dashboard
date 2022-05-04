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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('ap_no', 11);
            $table->date('date');
            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('appointments');
    }
};
