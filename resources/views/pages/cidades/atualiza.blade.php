@extends('index')

@section('content')
    <form method="POST" action="{{ route('atualizar.cidade', $findCidade->id) }}">
        @csrf
        @method('PUT')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Cidade</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $findCidade->nome ?? old('nome') }}" placeholder="Ex: Produto 1">
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }} </div>                
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input type="text" name="valor" class="form-control @error('valor') is-invalid @enderror" value="{{ $findCidade->valor ?? old('valor') }}">
            @if ($errors->has('valor'))
                <div class="invalid-feedback"> {{ $errors->first('valor') }} </div>                
            @endif
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection