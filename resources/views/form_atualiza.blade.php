@extends('template')

@section('titulo', 'Nova Entrada')

@section('conteudo')
<header class="text-center">
    EDITAR MOVIMENTO
</header>

<div class="container d-flex">
    <div class="col-md-12 p-3">
        <form action="{{ route('atualiza') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $movimento->id }}">

            <div class="mb-3">
              <label for="descricao" class="form-label">Descrição</label>
              <input type="text" required name="descricao" id="descricao" class="form-control" value="{{ $movimento->descricao }}">
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" required type="radio" name="tipo" id="tipo1" value="despesa" @if($movimento->tipo == 'despesa') checked @endif>
                <label class="form-check-label" for="tipo">Despesa</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" required type="radio" name="tipo" id="tipo2" value="receita" @if($movimento->tipo == 'receita') checked @endif>
                <label class="form-check-label" for="tipo">Receita</label>
              </div>

              <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" required name="valor" id="valor" class="form-control" step="0.01" value="{{ $movimento->valor }}">
              </div>

              <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>

@endsection()

@section('nav-complementar')
<li class="nav-item">
    <a class="nav-link" href="{{ route('seus_gastos') }}">
        Entenda os seus gastos
    </a>
</li>
@endsection