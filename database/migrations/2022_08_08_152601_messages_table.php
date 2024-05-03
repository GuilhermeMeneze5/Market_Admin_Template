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
        Schema::create('messages', function (Blueprint $table) {
            $table->id()->uniqid();
            $table->text('to');
            $table->text('from');
            $table->text('cc')->nullable();
            $table->text('title');
            $table->longText('favorite')->nullable();
            $table->longText('message');
            $table->longText('reply')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('messages');
    }
};
