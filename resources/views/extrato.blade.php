@extends('template')

@section('titulo', 'Extrato')

@section('conteudo')
<header class="text-center @if($totSaldo < 0)text-danger @endif fw-bold fs-1">
    EXTRATO - Saldo: R$ {{$totSaldo}}
</header>

<div class="row">
    <div class="col-md-6 p-3">
        <h2>Receitas - R$ {{ number_format($totReceitas, 2, ',', '.')}} </h2>

        @if(count($receitas) == 0)
            <p>Não há movimentação de receitas</p>
        @else

            @foreach($receitas as $receita)
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-title">{{ $receita->descricao }}</p>
                    <p class="card-text">R${{ number_format($receita->valor, 2, ',', '.') }}</p>
                </div>
                <div class="card-footer">
                    <span>{{ \Carbon\Carbon::parse($receita->created_at)->format('d/m/Y') }}</span> 
                    
                    <form method="POST" action="{{ route('deletar', [$receita->id]) }}" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onClick="if(!confirm('Tem certeza que deseja excluir?')){return false}" class="btn btn-link"><i class="fa-solid fa-trash-can"></i></button>
                    </form>

                    <a href="{{ route('editar', [$receita->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    
    <div class="col-md-6 p-3">
        <h2>Despesas - R$ {{ number_format($totDespesas, 2, ',', '.')}}</h2>

        @if(count($despesas) == 0)
            <p>Não há movimentação de despesas</p>
        @else
            @foreach($despesas as $despesa)
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-title">{{ $despesa->descricao }}</p>
                        <p class="card-text">R${{ number_format($despesa->valor, 2, ',', '.') }}</p>
                    </div>
                    <div class="card-footer">
                        <span>{{ \Carbon\Carbon::parse($despesa->created_at)->format('d/m/Y') }}</span> 

                        <form method="POST" action="{{ route('deletar', [$despesa->id]) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
    
                            <button type="submit" onClick="if(!confirm('Tem certeza que deseja excluir?')){return false}" class="btn btn-link"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
        

                        <a href="{{ route('editar', [$despesa->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
            @endforeach
        @endif
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