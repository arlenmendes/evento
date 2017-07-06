@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading">
            @if(isset($palestrante))
                <h3>Editar Palestrante</h3>
            @else
                <h3>Cadastrar Palestrante</h3>
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
            @if(!isset($palestrante))
                <form action="{{ route('palestrantes.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

            @else
                <form action="{{ route('palestrantes.update', $palestrante->id) }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
            @endif
                    <div class="form-group col-md-12">
                        <label for="nome">Nome:</label>
                        <input id="nome" type="text" name="nome" class="form-control" value="{{ $palestrante->nome or old('nome')}}" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cargo">Cargo:</label>
                        <input id="cargo" type="text" name="cargo" class="form-control" value="{{ $palestrante->cargo or old('cargo')}}" placeholder="cargo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="empresa">Empresa:</label>
                        <input id="empresa" type="text" name="empresa" class="form-control" value="{{ $palestrante->empresa or old('empresa')}}" placeholder="empresa">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="website">Website:</label>
                        <input id="website" type="text" name="website" class="form-control" value="{{ $palestrante->website or old('website')}}" placeholder="website">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="linkedin">Linkedin:</label>
                        <input id="linkedin" type="text" name="linkedin" class="form-control" value="{{ $palestrante->linkedin or old('linkedin')}}" placeholder="website">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="imagem">Foto:</label>
                        <input type="file" name="imagem" value="{{ old('imagem') }}" accept="image/*" class="form-control">
                    </div>
                    <div class="form-group col-md-4">

                        <button class="btn btn-primary btn-salvar">Salvar</button>
                    </div>

            </form>
        </div>
    </div>
@endsection