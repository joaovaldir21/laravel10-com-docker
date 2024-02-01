<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
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
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }

    /** Método para Cadastar produto */
    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == "POST") {
            //Cria o produto
            $data = $request->all();
            // Formata o campo valor para salvar com PONTO e não com vírgula
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);

            Toastr()->success('Produto cadastrado com sucesso!');

            return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
        }
        //Mostrar os produtos
        return view('pages.produtos.create');
    }

    /** Método para Atualizar produto */
    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {
             //Atualiza o produto
            $data = $request->all();
            // Formata o campo valor para salvar com PONTO e não com vírgula
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            Toastr()->success('Produto atualizado com sucesso!');

            return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
        }
        //Mostrar os produtos
        $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.atualiza', compact('findProduto'));
    }



}
