@extends('index')

@section('content')
    <form method="POST" action="{{ route('atualizar.estado', $findEstado->id) }}">
        @csrf
        @method('PUT')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Estado</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $findEstado->nome ?? old('nome') }}" placeholder="Ex: Estado 1">
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }} </div>                
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">UF</label>
            <input type="text" name="uf" class="form-control @error('uf') is-invalid @enderror" value="{{ $findEstado->uf ?? old('uf') }}">
            @if ($errors->has('uf'))
                <div class="invalid-feedback"> {{ $errors->first('uf') }} </div>                
            @endif
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection