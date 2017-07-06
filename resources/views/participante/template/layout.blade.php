<!doctype html>
<html>
<head>
    <title>Painel do Participante</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{url('css/participante.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
    <aside class="barra-lateral">
        <div class="barra-logo">
            <p>EVENTO</p>
        </div>
        <ul class="lista-links clearfix" >
            <li class=""><a href="/participantes"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
            <hr>
            <li><a href="/participantes/eventos"><span class="glyphicon glyphicon-lock"></span> Eventos</a></li>
            <li><a href="/participantes/meus-eventos"><span class="glyphicon glyphicon-list"></span> Meus Eventos</a></li>
        </ul>
    </aside>
    <section class="conteudo">
        <div class="barra-superior">
            <div>{{auth()->user()->name}}</div>
            <a class="btn btn-sair" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Sair
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <div id="container">
            @yield('content')
        </div>

        <script type="text/javascript" src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{{ url('/js/jquery.mask.min.js') }}"></script>
        <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    </section>
</div>
</body>
</html>