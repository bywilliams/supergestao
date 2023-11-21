<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item () {
        return $this->belongsTo('App\Models\Item', 'produto_id', 'id');

        /**
         * por convenção o Eloquent ORM vai entender a fk como 'item_id' 
         * 'item' pq é o nome do model q possui a tabela mais importante na relação e '_id' pq logicamente é a pk
         * sendo assim é necessário esse ajuste já que os models não possuem um nome convecional com as tabelas e o laravel não vai saber 
         * passando mais 2 parâmetros no belongsTo 'fk' e 'pk' 
         */
    }
}
