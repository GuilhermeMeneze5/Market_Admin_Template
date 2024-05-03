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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('text1')->nullable();
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->string('short_description');
            $table->string('long_description');
            $table->string('additional_information');

            $table->integer('category_id');

            $table->integer('custom1_id')->nullable();
            $table->integer('custom2_id')->nullable();
            $table->integer('custom3_id')->nullable();
            $table->integer('review_id')->nullable();

            $table->decimal('qtd_storage', 5, 2);
            $table->decimal('full_price', 8, 2);
            $table->decimal('discount_price', 8, 2);
            $table->decimal('discount', 5, 2);
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('file')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->boolean('blocked')->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('products');
    }
};
