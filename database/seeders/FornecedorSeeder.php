<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{

    public function run(): void
    {
    $fornecedor = new Fornecedor();
    $fornecedor->nome = 'Fornecedor';
    $fornecedor->site ='fornecedor.com.br';
    $fornecedor->uf='PR';
    $fornecedor->email='contato@fornecedor.com.br';
    $fornecedor->save();

    Fornecedor::create([
        'nome' => 'Fornecedor 2',
        'site' => 'fornecedor2.com.br',
        'uf' => 'RS',
        'email' => 'contato2@fornecedor.com.br'
    ]);


    }
}
