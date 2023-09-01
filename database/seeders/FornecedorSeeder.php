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

        // Usando método create eloquent (atenção ao atributo fillable)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.con.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        // Insert (Atenção! importar DB Facades)
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.con.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);

    }
}
