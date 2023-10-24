<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "produtos";
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe () {
        return $this->hasOne('App\models\ItemDetalhe', 'produto_id', 'id');

        /**
         * por convenção o Eloquent ORM vai procurar como FK na tabela produto_detalhes uma coluna 'item_id'
         * mas nessa tabela a coluna q recebe o pk da tabela produtos é a coluna produto_id
         * então é necessário esse ajuste já que os nomes dos models não estão padronizados com os nomes das tabelas
         * sendo assim é preciso passar como 2 parâmetro no hasOne o nome da fk 'produto_id' da tabela 2 no relacionamento e
         * como terceiro parâmetro a pk da tabela correspondente a este mesmo model q no caso é 'id'
         */
    }

    public function fornecedor () {
        return $this->belongsTo('App\models\fornecedor');
    } 
}
