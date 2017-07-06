@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading">
            Gerenciar Tipos de Eventos
        </div>
        <div class="panel-body">

            <p>
                <a class="btn btn-success " href="{{ route('eventos.index') }}">Voltar para Eventos </a>
                <a href="{{ route('tipos-evento.create') }}" class="btn btn-primary">Cadastrar</a>
            </p>
            <table class="table table-hover">
                <tr>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                @foreach($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->titulo }}</td>
                        <td>{{ $tipo->descricao }}</td>
                        <td>
                            <a class="acao acao-visualizar" href="{{ route('tipos-evento.edit', $tipo->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a class="acao acao-remover" href="{{ route('tipos-evento.destroy', $tipo->id) }}"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection