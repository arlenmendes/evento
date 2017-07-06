@extends('participante.template.layout')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Dados - Participante</div>
            <div class="panel-body">
                <p>Nome: {{ auth()->user()->name }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
                <hr>
                <p>CPF: {{ auth()->user()->participante->cpf }}</p>
                <p>Telefone: {{ auth()->user()->participante->telefone }}</p>
                <p>Data de Nascimento: {{ date("d-m-Y", strtotime(auth()->user()->participante->data_nascimento)) }}</p>
                <p>Cidade: {{ auth()->user()->participante->cidade }}</p>
                <p>UF: {{ auth()->user()->participante->uf }}</p>
                <p>Instituição: {{ auth()->user()->participante->instituicao }}</p>
                <p>Curso: {{ auth()->user()->participante->curso }}</p>
                <p>Matricula: {{ auth()->user()->participante->matricula }}</p>
                @if(auth()->user()->participante->necessidades_especiais)
                    <p>Necessidades Especiais: Sim</p>
                    <p>Descrição: {{ auth()->user()->participante->necessidades_especiais_comentario }}</p>
                @else
                    <p>Necessidades Especiais: Não</p>
                @endif
                <p><a href="/participantes/{{ auth()->user()->participante->id }}/edit" class="btn btn-primary" >Editar</a></p>



            </div>
        </div>
    </div>
@endsection