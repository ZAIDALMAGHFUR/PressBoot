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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('plastic_types_id');
            $table->foreign('plastic_types_id')->references('id')->on('plastic_types');
            $table->enum('status', ['income', 'expenditure']);
            $table->unsignedBigInteger('weight');
            $table->string('price');
            $table->enum('acc_status', ['waiting', 'approved', 'rejected'])->default('waiting');
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
        Schema::dropIfExists('tncome');
    }
};
