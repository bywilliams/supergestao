<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe () {
        return $this->hasOne('App\models\ProdutoDetalhe');

        /**
         * Verifica se Produto tem um produtoDetalhe
         * então ele verifica no BD se existe 1 registro relacionado em produto_detalhes (fk) -> produto_id
         * checando se produtos (pk) -> id existe na tabela produto_detalhes na coluna produto_id
         */

    }

}
