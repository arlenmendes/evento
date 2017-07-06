@extends('participante.template.layout')
@section('content')
    <div class="panel panel-default content">
        <div class="panel-heading">
            <h3>Eventos</h3>
        </div>
        <div class="panel-body">
            @if($mensagem)
                <div class="alert alert-success" >
                        <p>{{$mensagem}}</p>
                </div>
            @endif
            <ul id="dias" class="nav nav-tabs nav-justified">
                <li role="presentation" @if($diaAtual == 'segunda') class="active" @endif><a href="#segunda">Segunda</a></li>
                <li role="presentation" @if($diaAtual == 'terca') class="active" @endif><a href="#terca">Terça</a></li>
                <li role="presentation" @if($diaAtual == 'quarta') class="active" @endif><a href="#quarta">Quarta</a></li>
                <li role="presentation"><a href="#quinta">Quinta</a></li>
                <li role="presentation"><a href="#sexta">Sexta</a></li>
                <li role="presentation"><a href="#sabado">Sábado</a></li>
                <li role="presentation"><a href="#domingo">Domingo</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="segunda" @if($diaAtual == 'segunda') class="tab-pane active" @else class="tab-pane"  @endif>
                    <table class="table table-hover">
                        <tr>
                            <th>Titulo</th>
                            <th>Horario</th>
                            <th>Numero de Vagas</th>
                            <th>Vagas Ocupadas</th>
                            <th class="acoes">Ação</th>
                        </tr>
                        @foreach($eventos['segunda'] as $evento)
                            <tr>
                                <td>{{ $evento->titulo }}</td>
                                <td>{{ $evento->horario }}</td>
                                <td>{{ $evento->vagas }}</td>
                                <td>{{ $evento->vagas_ocupadas }}</td>
                                <td>
                                    @if(auth()->user()->inscrito($evento->id))
                                        <a href="/participantes/cancelar-inscricao/{{$evento->id}}/segunda" class="btn btn-danger">Cancelar</a>
                                    @elseif($evento->vagas > $evento->vagas_ocupadas)
                                        <a href="/participantes/inscrever/{{$evento->id}}/segunda" class="btn btn-success">Inscrever</a>
                                    @elseif($evento->vagas_espera > $evento->vagas_espera_ocupadas)
                                        <a href="/participantes/inscrever/{{$evento->id}}/segunda" class="btn btn-warning">Espera</a>
                                    @else
                                        <a href="" disabled="" class="btn btn-default">Esgotado</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div role="tabpanel" id="terca" @if($diaAtual == 'terca') class="tab-pane active" @else class="tab-pane"  @endif>
                    <table class="table table-hover">
                        <tr>
                            <th>Titulo</th>
                            <th>Horario</th>
                            <th>Numero de Vagas</th>
                            <th>Vagas Ocupadas</th>
                            <th class="acoes">Ação</th>
                        </tr>
                        @foreach($eventos['terca'] as $evento)
                            <tr>
                                <td>{{ $evento->titulo }}</td>
                                <td>{{ $evento->horario }}</td>
                                <td>{{ $evento->vagas }}</td>
                                <td>{{ $evento->vagas_ocupadas }}</td>
                                <td>
                                    @if(auth()->user()->inscrito($evento->id))
                                        <a href="/participantes/cancelar-inscricao/{{$evento->id}}/terca" class="btn btn-danger">Cancelar</a>
                                    @elseif($evento->vagas > $evento->vagas_ocupadas)
                                        <a href="/participantes/inscrever/{{$evento->id}}/terca" class="btn btn-success">Inscrever</a>
                                    @elseif($evento->vagas_espera > $evento->vagas_espera_ocupadas)
                                        <a href="/participantes/inscrever/{{$evento->id}}/terca" class="btn btn-warning">Espera</a>
                                    @else
                                        <a href="/participantes/cancelarInscricao" class="btn btn-default">Esgotado</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div role="tabpanel" id="quarta" @if($diaAtual == 'quarta') class="tab-pane active" @else class="tab-pane"  @endif>
                    @foreach($eventos['quarta'] as $evento)
                        <tr>
                            <td>{{ $evento->titulo }}</td>
                            <td>{{ $evento->horario }}</td>
                            <td>{{ $evento->vagas }}</td>
                            <td>{{ $evento->vagas_ocupadas }}</td>
                            <td>
                                @if(auth()->user()->inscrito($evento->id))
                                    <a href="/participantes/cancelar-inscricao/{{$evento->id}}/quarta" class="btn btn-danger">Cancelar</a>
                                @elseif($evento->vagas > $evento->vagas_ocupadas)
                                    <a href="/participantes/inscrever/{{$evento->id}}/quarta" class="btn btn-success">Inscrever</a>
                                @elseif($evento->vagas_espera > $evento->vagas_espera_ocupadas)
                                    <a href="/participantes/inscrever/{{$evento->id}}/quarta" class="btn btn-warning">Espera</a>
                                @else
                                    <a href="" disabled="" class="btn btn-default">Esgotado</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </div>
                <div role="tabpanel" id="quinta" @if($diaAtual == 'quinta') class="tab-pane active" @else class="tab-pane"  @endif>qui</div>
                <div role="tabpanel" id="sexta" @if($diaAtual == 'sexta') class="tab-pane active" @else class="tab-pane"  @endif> sex</div>
                <div role="tabpanel" id="sabado" @if($diaAtual == 'sabado') class="tab-pane active" @else class="tab-pane"  @endif>sab </div>
                <div role="tabpanel" id="domingo" @if($diaAtual == 'domingo') class="tab-pane active" @else class="tab-pane"  @endif>dom</div>
            </div>
        </div>
    </div>
@endsection