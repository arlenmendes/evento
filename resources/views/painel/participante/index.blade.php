@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading">
            <h3>Paricipantes</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Nome</th>
                    <th>email</th>
                    <th>Instituição</th>
                    <th>Matrícula</th>
                    <th>Ações</th>
                </tr>
                @foreach($participantes as $participante)
                <tr>
                    <td>{{ $participante->user->name }}</td>
                    <td>{{ $participante->user->email }}</td>
                    <td>{{ $participante->instituicao }}</td>
                    <td>{{ $participante->matricula }}</td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection