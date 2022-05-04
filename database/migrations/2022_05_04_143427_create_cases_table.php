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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('c_no', 11);
            $table->date('date');
            $table->string('pressure', 11);
            $table->string('temper', 11);
            $table->string('respira', 11);
            $table->string('pulse', 11);
            $table->string('disea');
            $table->unsignedBigInteger('pt_id');
            $table->foreign('pt_id')->references('id')->on('patients');
            $table->unsignedBigInteger('doc_id');
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
        Schema::dropIfExists('cases');
    }
};
