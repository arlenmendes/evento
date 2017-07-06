@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading painel-header-flex">
            <h3>Palestrantes</h3>
            <a href="{{ route('palestrantes.create') }}" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Empresa</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
                @foreach($palestrantes as $palestrante)
                    <tr>
                        <td>{{$palestrante->nome}}</td>
                        <td>{{$palestrante->cargo}}</td>
                        <td>{{$palestrante->empresa}}</td>
                        <td><img src="{{ url("img/palestrantes/{$palestrante->foto}") }}" alt=""></td>
                        <td class="acoes">
                            <a href="{{ route('palestrantes.show',$palestrante->id) }}"><i class="acao acao-visualizar glyphicon glyphicon-eye-open"></i></a>
                            <a href=""><i class="acao acao-remover glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection