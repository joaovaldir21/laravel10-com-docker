@extends('index')

@section('content')
    <form method="POST" action="{{ route('cadastrar.cidade') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar nova Cidade</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" placeholder="Ex: Cidade 1">
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }} </div>                
            @endif
        </div>

        <div class="mb-3">
            <label>* Selecione o Estado:</label>
            <select name="estado_id" class="form-control @error('estado_id') is-invalid @enderror" value="{{ old('estado_id') }}">
            @foreach($buscaCidades as $cidade)
                {{ $cidade->nome }}
            @endforeach
            <option value="{{ $cidade->estado_id }}" @if(isset($cidade) && $cidade->estado_id == "{{ $cidade->estado_id }}") selected @endif > {{ $cidade->estado->nome }} </option>
                @foreach($buscaEstados as $estado)
                    <option value="{{ $estado->id }}"> {{ $estado->uf }} </option>
                @endforeach
            </select>
        </div>
  

        <div class="mb-3">
            <label class="form-label">Código TCE</label>
            <input type="text" name="codigo_tce"  class="form-control @error('codigo_tce') is-invalid @enderror" value="{{ old('codigo_tce') }}">
            @if ($errors->has('codigo_tce'))
                <div class="invalid-feedback"> {{ $errors->first('codigo_tce') }} </div>                
            @endif
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection