<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* 
Nome da tabela gerado pelo eloquent sera 'fornecedors'
porém o nome correto da tabela é 'fornecedores' em PT
*/
class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores'; // declara o nome correto da tabela

}
