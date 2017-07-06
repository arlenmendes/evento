@extends('participante.template.layout')
@section('content')
    <div class="panel panel-default content">
        <div class="panel-heading">
            <h4>Meus Eventos</h4>
        </div>
        <div class="panel-body">
            <table class="table-hover table">
                <tr>
                    <th>Titulo</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->titulo }}</td></a>
                        <td>{{ date("d-m-Y", strtotime($evento->data)) }}</td>
                        <td><a href="">{{ $evento->horario }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection