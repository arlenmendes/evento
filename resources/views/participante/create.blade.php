@extends('participante.template.layout')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                @if(!isset(auth()->user()->participante))
                    Finalizar Cadastro - Participante
                @else
                    Alterar Cadastro - Participante
                @endif
            </div>
            <div class="panel-body">

                @if(!isset(auth()->user()->participante))
                <div class="alert alert-success">
                    <p>Para prosseguir utilizando o sistema, conclua seu cadastro:</p>
                </div>
                @endif
                @if( isset($errors) && count($errors) > 0 )
                    <div class="alert alert-danger" >
                        @foreach( $errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                @if(isset($participante))
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('participantes.update', $participante->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}
                @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('participantes.store') }}">
                    {!! csrf_field() !!}
                @endif
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                    <div class="form-group">
                        <label for="telefone" class="col-md-4 control-label">Telefone</label>

                        <div class="col-md-6">
                            <input id="telefone" type="text" class="form-control" name="telefone"  value="{{ $participante->telefone or old('telefone') }}" placeholder="Ex: 35 999999999">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-md-4 control-label">CPF</label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control" name="cpf"  value="{{ $participante->cpf or old('cpf') }}" placeholder="Ex: 12365478901">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nascimento" class="col-md-4 control-label">Data de Nascimento</label>

                        <div class="col-md-6">
                            <input id="nascimento" type="text" class="form-control" name="data_nascimento" onkeypress="mascaraData(this)" maxlength="10"  value="{{ $participante->data_nascimento or old('data_nascimento') }}" placeholder="12-05-1999">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cidade" class="col-md-4 control-label">Cidade</label>

                        <div class="col-md-6">
                            <input id="cidade" type="text" class="form-control" name="cidade"  value="{{ $participante->cidade or old('cidade') }}" placeholder="Ex: São Paulo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="uf" class="col-md-4 control-label">UF</label>

                        <div class="col-md-6">
                            <input id="uf" type="text" class="form-control" name="uf"  value="{{ $participante->uf or old('uf') }}" placeholder="MG">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="curso" class="col-md-4 control-label">Curso</label>

                        <div class="col-md-6">
                            <input id="curso" type="text" class="form-control" name="curso"  value="{{ $participante->curso or old('curso') }}" placeholder="Ex: Sistemas de Informação">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="instituicao" class="col-md-4 control-label">Instituição</label>

                        <div class="col-md-6">
                            <input id="instituicao" type="text" class="form-control" name="instituicao"  value="{{ $participante->instituicao or old('instituicao') }}" placeholder="Ex: Ufla">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="matricula" class="col-md-4 control-label">Matricula</label>

                        <div class="col-md-6">
                            <input id="matricula" type="text" class="form-control" name="matricula"  value="{{ $participante->matricula or old('matricula') }}" placeholder="Ex: 201710000">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox col-md-6 col-md-offset-4">
                            <label>
                                <input type="checkbox" value="0" name="necessidades_especiais" @if(isset($participante) && $participante->necessidades_especiais == '1' ) checked @endif > Necessidades Especiais
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descricao_necessidades" class="col-md-4 control-label">Descrição Necessidades Especiais</label>

                        <div class="col-md-6">
                            <textarea class="form-control" rows="3" name="necessidades_especiais_comentario" id="descricao_necessidades">{{ $participante->necessidades_especiais_comentario or old('necessidades_especiais_comentario') }}</textarea>
                        </div>
                    </div>

                        <input type="text" value="{{ auth()->user()->id }}" name="user_id" disabled style="display: none">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">

                                @if(isset($participante))
                                    Atualizar
                                @else
                                    Cadastrar
                                @endif
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
