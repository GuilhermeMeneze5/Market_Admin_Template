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
        Schema::create('cart_items', function (Blueprint $table) {

            $table->id();
            $table->timestamp('validade_cart');
            $table->string('product_name');
            $table->foreignId('product_id')->constrained();
            $table->decimal('preco_unitario', 10, 2);
            $table->decimal('vl_desconto_unitario', 10, 2)->nullable();
            $table->decimal('per_desconto_unitario', 5, 2)->nullable();
            $table->string('customizacao1')->nullable();
            $table->decimal('acressimo1', 10, 2)->nullable();
            $table->string('customizacao2')->nullable();
            $table->decimal('acressimo2', 10, 2)->nullable();
            $table->string('customizacao3')->nullable();
            $table->decimal('acressimo3', 10, 2)->nullable();
            $table->integer('quantidade');
            $table->decimal('valor_total', 10, 2);
            $table->decimal('desconto_cupom', 10, 2)->nullable();
            $table->unsignedBigInteger('cupom_id')->nullable();
            $table->string('codigo_cupom')->nullable();
            $table->decimal('valor_desc_cupom', 10, 2)->nullable();
            $table->timestamp('validade_cupom')->nullable();
            $table->boolean('blocked')->default(false);
            $table->decimal('frete', 10, 2)->nullable();
            $table->decimal('peso', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->string('imagem')->nullable();
            $table->string('moeda')->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->foreignId('user_id')->constrained();


            $table->softDeletes();
            $table->timestamps();


            //$table->foreign('cupom_id')->references('id')->on('cupons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
