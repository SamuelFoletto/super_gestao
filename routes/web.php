<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;

Route::middleware([LogAcessoMiddleware::class])->group(function () {
    Route::name('site.index')->get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);

    Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

    Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
    Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

    Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

    Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

    Route::fallback(function (){
        echo 'Rota acessada não foi localizada!<br><a href="/">Retorne para a página inicial</a>';
    });
});

    Route::prefix('/app')->group(function (){
        Route::middleware(['Log', 'Auth:padrao,visitante'])->group(function () {
            Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
            Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
            Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');
            Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');

            Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
            Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
            Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

            Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
            Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

            Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

            Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
        });
    });


