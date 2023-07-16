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
        Schema::create('incomes_pengepuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengepuls_id');
            $table->foreign('pengepuls_id')->references('id')->on('pengepuls');
            $table->string('no_telp');
            $table->string('tanggal');
            $table->unsignedBigInteger('plastic_types_id');
            $table->foreign('plastic_types_id')->references('id')->on('plastic_types');
            $table->enum('status', ['income', 'expenditure']);
            $table->unsignedBigInteger('weight');
            $table->string('price');
            $table->string('foto');
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
        Schema::dropIfExists('incomes_pengepul');
    }
};
