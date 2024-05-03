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
        Schema::create('message_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('message_id')->constrained();
            $table->boolean('important')->nullable()->default(false);
            $table->boolean('promotions')->nullable()->default(false);
            $table->boolean('social')->nullable()->default(false);
            $table->boolean('drafts')->nullable()->default(false);
            $table->boolean('blocked')->nullable()->default(false);
            $table->datetime('read_at')->nullable()->default(null);

            $table->softDeletes();
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
        Schema::dropIfExists('message_user');
    }
};
