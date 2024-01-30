<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    protected $produto;
    
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }


    /**Pagina INDEX inicial com exibição dos produtos
     * Config da variável de PESQUISAR
     */
    public function index (Request $request) 
    {
        $pesquisar =  $request->pesquisar;

        $findProdutos = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProdutos'));
    }

    /**
     * Metodo DELETE para produto
     */
    public function delete(Request $request)
    {
        
    }



}
