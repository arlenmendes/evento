@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading">Gereniar Eventos</div>
        <div class="panel-body">
            <p>
                <a href="/painel/eventos/create" class="btn btn-primary">Cadastrar</a>
                <a href="{{ route('tipos-evento.index') }}" class="btn btn-success">Gerenciar Tipos de Evento</a>
            </p>
            <table class="table table-hover">
                <tr>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Número de Vagas</th>
                    <th>Vagas Diponíveis</th>
                    <th class="acoes">Ações</th>
                </tr>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->titulo }}</td>
                        <td>{{ date("d-m-Y", strtotime($evento->data)) }}</td>
                        <td>{{ $evento->horario }}</td>
                        <td>{{ $evento->vagas }}</td>
                        <td>{{ $evento->vagas - $evento->vagas_ocupadas }}</td>
                        <td>
                            <a href="{{ route('eventos.show', $evento->id) }}"><i class="glyphicon glyphicon-eye-open acao acao-visualizar"></i></a>
                            <a><i class="glyphicon glyphicon-remove acao acao-remover"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection