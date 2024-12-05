<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
         $fornecedor_id = DB::table('fornecedores')->insertGetId([
               'nome' => 'Fornecedor padrão',
               'site' => 'fornecedor.padrão.com.br',
               'uf' => 'PR',
               'email' => 'fornecedor.padrão.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }


    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {

            $table->dropForeign('<>_foreign');
            $table->dropCoumn('fornecedor_id');
        });
    }
};
