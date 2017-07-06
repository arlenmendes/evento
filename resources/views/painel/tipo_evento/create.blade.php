@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading">
            @if(isset($evento))
                Alterar Evento

            @else
                Cadastrar Evento
            @endif
        </div>
        <div class="panel-body">
            @if( isset($errors) && count($errors) > 0 )
                <div class="alert alert-danger" >
                    @foreach( $errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            @if(!isset($tipoEvento))
                <form action="{{ route('tipos-evento.store') }}" method="post" class="col-xm-12">
                    {{ csrf_field() }}

            @else
                <form action="{{ route('tipos-evento.update', $tipoEvento->id) }}" method="post" class="col-xm-12">
                    {{ csrf_field() }}
                    {!! method_field('put') !!}
            @endif
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input id="titulo" type="text" name="titulo" class="form-control" value="{{ $tipoEvento->titulo or old('titulo')}}" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <label for="desc">Descricão:</label>
                    <textarea class="form-control" name="descricao" id="desc" rows="2">{{ $tipoEvento->descricao or old('descricao') }}</textarea>
                </div>

                    <button class="btn btn-primary">Salvar</button>

            </form>
            <p></p>
            <p>
                <a class="btn btn-warning" href="{{ route('tipos-evento.index') }}">Cancelar</a>
            </p>
        </div>
    </div>
@endsection