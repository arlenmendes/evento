@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default palestrantes-show">
        <div class="panel-heading"><h3>Palestrante</h3></div>
        <div class="panel-body">
            <img src="{{ url('img/palestrantes/'.$palestrante->foto) }}" alt="Sem Imagem">
            <h3>{{ $palestrante->nome }}</h3>
            <p><b>{{ $palestrante->cargo }}</b> - {{ $palestrante->empresa }}</p>
            <p>Linkedin: {{ $palestrante->linkedin }}</p>
            <p>Site: {{ $palestrante->website }}</p>
            <a href="{{ route('palestrantes.edit', $palestrante->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
@endsection