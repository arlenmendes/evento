@extends('painel.template.layout')
@section('content')
    <div class="content panel panel-default">
        <div class="panel-heading"><h2>Início</h2></div>
        <div class="panel-body">

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Eventos
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">{{ $quantidadeEventos or 0 }} eventos</h4>
                    </div>
                    <div class="card-footer">
                        <a href="/painel/eventos" class="btn btn-primary">Mais detalhes...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Participantes
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">{{ $quantidadeParticipantes or 0}} Participante(s)</h4>

                    </div>
                    <div class="card-footer text-muted">
                        <a href="/painel/participantes" class="btn btn-primary">Mais detalhes...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Palestrantes
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">{{ $quantidadePalestrantes or 0 }} palestrantes(s)</h4>
                    </div>
                    <div class="card-footer">
                        <a href="/painel/palestrantes" class="btn btn-primary">Mais detalhes...</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection