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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('TIPO');
            $table->time('hora_entrada')->nullable();
            $table->time('hora_saida')->nullable();
            $table->date('dia_entrada')->nullable();
            $table->date('dia_saida')->nullable();
            $table->time('hora_trabalhada')->nullable();
            $table->tinyInteger('STATUS');
            $table->boolean('CLOSED_BY')->nullable();
            $table->date('DAY_CHECKED')->nullable();
            $table->string('CHECKED_BY')->nullable();
            $table->tinyInteger('CHECKED_BY_ID')->nullable();
            $table->string('CREATED_BY');
            $table->tinyInteger('CREATED_BY_ID');
            $table->string('OBS')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
};
