<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCustoms extends Migration
{
    public function up()
    {
        Schema::create('product_customs', function (Blueprint $table) {
            $table->id();
            $table->string('custom_nome');
            $table->boolean('blocked')->default(false);

            $table->boolean('custom_status1')->default(false)->nullable();
            $table->boolean('custom_status2')->default(false)->nullable();
            $table->boolean('custom_status3')->default(false)->nullable();
            $table->boolean('custom_status4')->default(false)->nullable();
            $table->boolean('custom_status5')->default(false)->nullable();
            $table->boolean('custom_status6')->default(false)->nullable();
            $table->boolean('custom_status7')->default(false)->nullable();
            $table->boolean('custom_status8')->default(false)->nullable();
            $table->boolean('custom_status9')->default(false)->nullable();
            $table->string('custom_valor1', 10, 2)->nullable()->nullable();
            $table->string('custom_valor2', 10, 2)->nullable()->nullable();
            $table->string('custom_valor3', 10, 2)->nullable()->nullable();
            $table->string('custom_valor4', 10, 2)->nullable()->nullable();
            $table->string('custom_valor5', 10, 2)->nullable()->nullable();
            $table->string('custom_valor6', 10, 2)->nullable()->nullable();
            $table->string('custom_valor7', 10, 2)->nullable()->nullable();
            $table->string('custom_valor8', 10, 2)->nullable()->nullable();
            $table->string('custom_valor9', 10, 2)->nullable()->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('product_customs');
    }
}
