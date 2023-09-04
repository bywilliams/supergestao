<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\Fornecedor;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = "Fornecedor 100";
        $fornecedor->site = "fornecedor100.com.br";
        $fornecedor->uf = "CE";
        $fornecedor->email = "contato@fornecedor100.com.br";
        $fornecedor->save();
    }
}
