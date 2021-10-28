@extends('templates.base')
@section('title', 'Recados')
@section('h1', 'Página de Recados')

@section('content')

<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de Recados</p>

        <a class="btn btn-primary" href="{{route('recados.inserir')}}" role="button">Cadastrar recado</a>
    </div>
</div>

<!--Mostra a tabela com todos os recados -->
<div class="row">
    <table class="table">
        <tr>
            <th width="50%">Nome</th>
            <th>Comentario</th>
        </tr>

        @foreach($recados as $recado)
        <tr>
            <td>
                {{$recado->nome}}
            </td>
            <td>{{$recado->comentario}}</td>
            <td>
                <a href="{{route('recados.editar',$recado)}}" class="btn btn-primary btn-sm" role="button"><i class="bi bi-pencil-square"></i> Editar</a>
                <!--Confere se o usuario está logado -->
                @if (session('usuario'))
                <a href="{{route('recados.excluir',$recado)}}" class="btn btn-danger btn-sm" role="button"><i class="bi bi-trash"></i> Apagar</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection