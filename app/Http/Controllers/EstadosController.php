<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestEstado;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    protected $estado;
    
    public function __construct(Estado $estado)
    {
        $this->estado = $estado;
    }

    /**Pagina INDEX inicial com exibição dos estados
     * Config da variável de PESQUISAR
     */
    public function index (Request $request) 
    {
        $pesquisar =  $request->pesquisar;

        $findEstados = $this->estado->getEstadosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.estados.paginacao', compact('findEstados'));
    }

    /**
     * Metodo DELETE para estado
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Estado::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }

    /** Método para Cadastar estado */
    public function cadastrarEstado(FormRequestEstado $request)
    {
        if ($request->method() == "POST") {
            //Cria o estado
            $data = $request->all();
            Estado::create($data);

            Toastr()->success('Estado cadastrado com sucesso!');

            return redirect()->route('estados.index')->with('success', 'Estado cadastrado com sucesso!');
        }
        //Mostrar os produtos
        return view('pages.estados.create');
    }

    /** Método para Atualizar produto */
    public function atualizarEstado(FormRequestEstado $request, $id)
    {
        if ($request->method() == "PUT") {
             //Atualiza o produto
            $data = $request->all();

            $buscaRegistro = Estado::find($id);
            $buscaRegistro->update($data);

            Toastr()->success('Estado atualizado com sucesso!');

            return redirect()->route('estados.index')->with('success', 'Estado atualizado com sucesso!');
        }
        //Mostrar os produtos
        $findEstado = Estado::where('id', '=', $id)->first();
        return view('pages.estados.atualiza', compact('findEstado'));
    }





}
