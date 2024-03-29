<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // adiciona apenas as as novas colunas
        // schema::table seleciona a tabela já existente
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('fornecedores', function (Blueprint $table) {
            // É possível remover colunas de forma individual
            // $table->droColumn('uf');
            // $table->dropColumn('email');

            // Ou remover passar um array de colunas
            $table->dropColumn(['uf', 'email']);
        });
    }
};
