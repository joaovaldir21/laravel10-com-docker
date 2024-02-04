<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCidade;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    
    protected $cidade;
    
    public function __construct(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }


    /**Pagina INDEX inicial com exibição dos cidades
     * Config da variável de PESQUISAR
     */
    public function index (Request $request) 
    {
        $pesquisar =  $request->pesquisar;

        $findCidades = $this->cidade->getCidadesPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.cidades.paginacao', compact('findCidades'));
    }

    /**
     * Metodo DELETE para produto
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Cidade::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }

    /** Método para Cadastar cidade */
    public function cadastrarCidade(FormRequestCidade $request)
    {
        if ($request->method() == "POST") {
            //Cria cidade
            $data = $request->all();

            
            Cidade::create($data);

            Toastr()->success('Cidade cadastrada com sucesso!');

            return redirect()->route('cidades.index')->with('success', 'Cidade cadastrada com sucesso!');
        }
        //Mostrar as cidades
        $buscaCidades = Cidade::all();
        $buscaEstados = Estado::all();
        return view('pages.cidades.create', compact('buscaCidades', 'buscaEstados'));
    }

    /** Método para Atualizar produto */
    public function atualizarCidade(FormRequestCidade $request, $id)
    {
        if ($request->method() == "PUT") {
             //Atualiza o cidade
            $data = $request->all();

            $buscaRegistro = Cidade::find($id);
            $buscaRegistro->update($data);

            Toastr()->success('Cidade atualizada com sucesso!');

            return redirect()->route('cidades.index')->with('success', 'Cidade atualizada com sucesso!');
        }
        //Mostrar os produtos
        $findCidade = Cidade::where('id', '=', $id)->first();
        return view('pages.cidades.atualiza', compact('findCidade'));
    }



}
