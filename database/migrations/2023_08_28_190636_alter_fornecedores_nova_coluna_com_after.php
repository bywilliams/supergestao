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
        // adiciona uma nova coluna após um coluna especifica da tabela, usando after
        Schema::table('fornecedores', function(Blueprint $table) {
            $table->string('site', 150)->after('nome')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // remove coluna adicionada
        Schema::table('fornecedores', function(Blueprint $table) {
            $table->dropColumn('site');
        });
    }
};
