@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>

    <div>
        <form action="{{ route('produtos.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button type="button" class="btn btn-primary"> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success float-end">
                Incluir Produto
            </a>
        </form>

        <div class="table-responsive small mt-4">

            {{-- Exibe mensagen Sucesso--}}
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Exibe mensagen Erro--}}
            @if (session('erro'))
                <div class="alert alert-danger" role="alert">
                    {{ session('erro') }}
                </div>
            @endif
            {{-- Exibe mensagen Alerta--}}
            @if (session('info'))
                <div class="alert alert-warning" role="alert">
                    {{ session('info') }}
                </div>
            @endif


            @if ($findProdutos->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Não existe dados!
                </div>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Cadastro</th>
                        <th>Atualizado</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($findProdutos as $produto )
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                                <td>{{ date('d-m-Y - H:i:s', strtotime("$produto->created_at")) }}</td>
                                <td>{{ date('d-m-Y - H:i:s', strtotime("$produto->updated_at")) }}</td>
                                <td>
                                    <a href="{{ route('atualizar.produto', $produto->id) }}" class="btn btn-info btn-sm"> Editar </a>

                                    {{-- Para excluir com AJAX(Carregando...) --}}
                                    <meta name="csrf-token" content=" {{ csrf_token() }}" />
                                    <a onclick="deleteRegistroPaginacao( '{{ route('produto.delete') }}', {{ $produto->id }} )" class="btn btn-danger btn-sm"> Excluir </a>
                                </td>
                            </tr>
                            
                        @endforeach
        
                    </tbody>
                </table> 
            @endif
        </div>




    </div>

@endsection