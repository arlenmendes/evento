@extends('painel.template.layout')
@section('content')
    <div class="panel panel-body content">
        <div class="panel-heading">
            <h3>Detalhes do Evento <b>{{ $evento->titulo }}</b></h3>
        </div>
        <div class="panel-body">
            <p>{{ $evento->tipoEvento->titulo }}</p>
            <h4> <b>Descrição:</b> {{ $evento->descricao }}</h4>
            <p>Data: {{ date("d-m-Y", strtotime($evento->data)) }} às {{ $evento->horario }}</p>
            <p><b>Total de vagas:</b> {{ $evento->vagas }}</p>
            <p><b>Vagas restantes: {{ $evento->vagas - $evento->vagas_ocupadas }}</b></p>
            <p><b>Total de vagas em Espera: {{ $evento->vagas_espera }}</b></p>
            <p><b>Total de vagas em Espera restantes: {{ $evento->vagas_espera - $evento->vagas_espera_ocupadas }}</b></p>
            <p><a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a></p>
        </div>
    </div>
@endsection