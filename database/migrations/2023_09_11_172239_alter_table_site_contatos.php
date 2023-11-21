<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // cria a nova coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // migra os dados da antiga coluna motivo_contato para motivo_contatos_id
        DB::statement('UPDATE site_contatos SET motivo_contatos_id = motivo_contato');

        // Aplica fk na coluna motivo_contatos_id estabelecendo relacao com a coluna id da tabela motivo_contatos
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cria novamente a coluna motivo_contato e remove a fk
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // migra os dados de motivo_contatos_id para antiga coluna motivo_contato 
        DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contatos_id');

        // Remove a nova coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });

    }
};
