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
            @if(isset($errorVaga))
                <div class="alert alert-danger" >
                    <p>{{ $erroVaga }}</p>
                </div>
            @endif
            @if(!isset($evento))
            <form action="{{ route('eventos.store') }}" method="post">
                {{ csrf_field() }}

            @else
                <form action="{{ route('eventos.update', $evento->id) }}" method="post">
                    {{ csrf_field() }}
                    {!! method_field('put') !!}
            @endif

            <div class="form-group col-md-12">
                <label for="titulo">Título: </label>
                <input id="titulo" type="text" name="titulo" class="form-control" placeholder="Título" value="{{ $evento->titulo or old('titulo') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="">Tipo: </label>
                <select name="tipo_evento_id" id="" class="form-control">
                    <option value="">Escolha</option>
                    @foreach($tiposEvento as $tipoEvento)
                        <option value="{{$tipoEvento->id}}" @if(isset($evento) && $evento->tipo_evento_id == $tipoEvento->id) selected @endif>{{ $tipoEvento->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" id="descricao" rows="3" class="form-control" placeholder="Descrição...">{{ $evento->descricao or old('descricao') }}</textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="data">Data: </label>
                <input id="data" type="text" name="data" maxlength="10" class="form-control data-calender" placeholder="12-12-2017" value="{{ $evento->data or old('data') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="horario">Horário: </label>
                <input id="horario" type="text" name="horario" class="form-control horario" value="{{ $evento->horario or old('horario') }}" maxlength="8" placeholder="12:00:00">
            </div>
            <div class="form-group col-md-6">
                <label for="vagas">Número de Vagas: </label>
                <input id="vagas" type="number" name="vagas" class="form-control" value="{{ $evento->vagas or old('vagas') }}" placeholder="Vagas" @if(isset($evento) && $evento->vagas == $evento->vagas_ocupadas) disabled @endif>
            @if(isset($evento))
                    <span>Já foram realizadas {{ $evento->vagas_ocupadas }} inscrições para este evento, então não será permitido que altere para uma quantidade inferior. Se for informado um valor menor que o número de vagas ocupadas, o sistema ira alterar o número de vagas para EXATAMENTE o número de vagas ocupadas.</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="duracao">Duração: </label>
                <input id="duracao" type="text" name="duracao" class="form-control horario" value="{{ $evento->duracao or old('duracao') }}" maxlength="8" placeholder="02:30:00 HH:MM:SS">
            </div>
            <div class="form-group col-md-6">
                <label for="vagas_espera">Números de Vagas para espera: </label>
                <input id="vagas_espera" type="number" name="vagas_espera" class="form-control" value="{{ $evento->vagas_espera or old('vagas_espera') }}" placeholder="Vagas espera">
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
@endsection