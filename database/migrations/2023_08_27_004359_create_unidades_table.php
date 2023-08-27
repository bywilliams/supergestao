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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // Cria relacionamento com a tabela produtos
        schema::table('produtos', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');

            // Adiciona a constraint (indica que a coluna referencia a coluna id da tabela 'unidades')
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });


        // Cria relacionamento con a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            
            // Adiciona a constraint (indica que a coluna referencia a coluna id da tabela 'unidades')
            $table->foreign('unidade_id')->references('id')->on('unidades');
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        // Remove relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            // Primeiro remove-se a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // convenção de nome para foreign key do laravel [table]_[column]_foreign
            // Remover a coluna de relacionamento
            $table->dropColumn('unidade_id');
        });

        // Remove relacionamento com a tabela produto_detalhes
        Schema::table('produtos', function(Blueprint $table) {
            // Primeiro remove-se a fk
            $table->dropForeign('produtos_unidade_id_foreign'); // convenção de nome para foreign key do laravel [table]_[column]_foreign
            // Remover a coluna de relacionamento
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
