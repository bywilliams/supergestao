<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instanciando objeto
        $siteContato = new SiteContato();
        // Atribuindo valores
        $siteContato->nome = "Aplicação Super Gestão";
        $siteContato->telefone = "(11) 91234-5678";
        $siteContato->email = "contato@supergestao.com.br";
        $siteContato->motivo_contato = 1;
        $siteContato->mensagem = "Seja bem vindo ao Suoer Gestão";
        // Salvando no BD
        $siteContato->save();
    }
}
