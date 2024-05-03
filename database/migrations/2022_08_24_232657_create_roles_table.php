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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('STATUS')->default(0);
            $table->string('role_name');
            $table->string('role_description');
            $table->tinyInteger('Messages');
            $table->tinyInteger('Reports');
            $table->tinyInteger('Scales');
            $table->tinyInteger('Officermen');
            $table->tinyInteger('Register');
            $table->tinyInteger('Settings');
            $table->tinyInteger('Request');
            $table->boolean('blocked')->nullable()->default(false);
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
