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
        Schema::create('environments', function (Blueprint $table) {
            $table->id()->uniqid;
            $table->string('title');
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();
            $table->string('setor')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('cep')->nullable();
            $table->string('email')->nullable();
            $table->string('email_cobranca')->nullable();
            $table->string('endereco_cobranca')->nullable();
            $table->string('cep_cobranca')->nullable();
            $table->string('cidade_cobranca')->nullable();
            $table->string('uf_cobranca')->nullable();
            $table->string('cep_entrega')->nullable();
            $table->string('uf_entrega')->nullable();
            $table->string('endereco_entrega')->nullable();
            $table->string('cidade_entrega')->nullable();
            $table->string('telefone')->nullable();
            $table->string('destinacao')->nullable();
            $table->string('XID_Token')->unique();
            $table->string('buyed_at')->nullable();
            $table->string('expired_at')->nullable();
            $table->string('total_users')->nullable();
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
        Schema::dropIfExists('environments');
    }
};
