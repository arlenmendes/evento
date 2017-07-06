<!doctype html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Painel Gestão Evento</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/card.css') }}">
        <link rel="stylesheet" href="{{ url('css/painel.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <aside class="barra-lateral">
                <div class="barra-logo">
                    <p>AM DevWeb</p>
                </div>
                <ul class="lista-links clearfix" >
                    <li><a href="/painel"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                    <hr>
                    <li><a href="/painel/eventos"><span class="glyphicon glyphicon-list"></span> Eventos</a></li>
                    <hr>
                    <li><a href="{{ route('painel.participantes.index') }}"><span class="glyphicon glyphicon-user"></span> Participantes</a></li>
                    <hr>
                    <li><a href="{{ route('palestrantes.index') }}"><span class="glyphicon glyphicon-user"></span> Palestrantes</a></li>
                    <hr>
                </ul>
            </aside>
            <section class="conteudo">
                <div class="barra-superior">
                    <div>{{ auth()->user()->name }}</div>
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
            </section>
        </div>
        <script src="{{ url('/js/bootstrap.js') }}"></script>
        <script src="{{ url('/js/app.js') }}"></script>
    </body>
</html>