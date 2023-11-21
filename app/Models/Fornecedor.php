<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/* 
Nome da tabela gerado pelo eloquent sera 'fornecedors'
porém o nome correto da tabela é 'fornecedores' em PT
*/
class Fornecedor extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'fornecedores'; // declara o nome correto da tabela

    protected $fillable = ['nome', 'site', 'uf', 'email']; // especifica os campos que vão receber valores ao salvar registro

    public function produtos () {
        return $this->hasMany('App\Models\Produto', 'fornecedor_id', 'id');	
    }

}
