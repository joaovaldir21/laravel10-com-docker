<?php

use App\Http\Controllers\CidadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/** Rotas para Estados */
Route::prefix('estados')->group(function () {
    //Exibir INDEX
    Route::get('/', [EstadosController::class, 'index'])->name('estados.index');
    //Cadastro CREATE
    Route::get('/cadastrarEstado', [EstadosController::class, 'cadastrarEstado'])->name('cadastrar.estado');
    Route::post('/cadastrarEstado', [EstadosController::class, 'cadastrarEstado'])->name('cadastrar.estado');
    //Atualizar UPDATE
    Route::get('/atualizarEstado/{id}', [EstadosController::class, 'atualizarEstado'])->name('atualizar.estado');
    Route::put('/atualizarEstado/{id}', [EstadosController::class, 'atualizarEstado'])->name('atualizar.estado');
    //Deletar DELETE
    Route::delete('/delete', [EstadosController::class, 'delete'])->name('estado.delete');
});

/** Rotas para Cidades */
Route::prefix('cidades')->group(function () {
    //Exibir INDEX
    Route::get('/', [CidadesController::class, 'index'])->name('cidades.index');
    //Cadastro CREATE
    Route::get('/cadastrarCidade', [CidadesController::class, 'cadastrarCidade'])->name('cadastrar.cidade');
    Route::post('/cadastrarCidade', [CidadesController::class, 'cadastrarCidade'])->name('cadastrar.cidade');
    //Atualizar UPDATE
    Route::get('/atualizarCidade/{id}', [CidadesController::class, 'atualizarCidade'])->name('atualizar.cidade');
    Route::put('/atualizarCidade/{id}', [CidadesController::class, 'atualizarCidade'])->name('atualizar.cidade');
    //Deletar DELETE
    Route::delete('/delete', [CidadesController::class, 'delete'])->name('cidade.delete');
});

/** Rotas para Produtos */
Route::prefix('produtos')->group(function () {
    //Exibir INDEX
    Route::get('/', [ProdutosController::class, 'index'])->name('produtos.index');
    //Cadastro CREATE
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //Atualizar UPDATE
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    //Deletar DELETE
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

/** Rotas para Clientes */
Route::prefix('clientes')->group(function () {
    //Exibir INDEX
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    //Cadastro CREATE
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //Atualizar UPDATE
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    //Deletar DELETE
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});
