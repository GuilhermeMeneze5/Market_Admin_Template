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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('name_event');
            $table->boolean('allday')->nullable()->default(false);
            $table->datetime('start');
            $table->datetime('end');
            $table->string('vehicles')->nullable();
            $table->longtext('users');
            $table->string('destination');
            $table->longtext('description')->nullable();
            $table->boolean('blocked')->nullable()->default(false);
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
        Schema::dropIfExists('events');
    }
};
