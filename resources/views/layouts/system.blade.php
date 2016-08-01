<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    {!! Html::style('css/estilos.css') !!}
    {!! Html::style('https://file.myfontastic.com/H5wukG4FXB5y6c5jr2DXMJ/icons.css') !!}
    <link rel="shortcut icon" href="/img/favicon.png">
    <title>Administracion de Inscripciones a Escuelas Permanentes</title>
</head>
<body class="sistema">
    <div id="carga"></div>
    <div class="main-container">
        @include('layouts.menusystem')
        <main class="main-content">
            @if(Session::has('success_message'))
                <div class="success message icon-check-circle">
                    {{Session::get('success_message')}}
                    <a href="#0" class="message-close icon-cancel" title="Cerrar"></a>
                </div>
            @elseif(Session::has('error_message'))
                <div class="error message icon-exclamation-circle">
                    {{Session::get('error_message')}}
                    <a href="#0" class="message-close icon-cancel" title="Cerrar"></a>
                </div>
            @endif
            <div class="user icon-user">Bienvenido {{ Auth::user()->name }}<a href="{{ url('/logout') }}">Cerrar sesión</a></div>
            @yield('contenido')
        </main>
    </div>
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/efectos.js') !!}
    {!! Html::script('js/scripts.js') !!}
    {!! Html::script('js/jquery.maskMoney.min.js') !!}
    @yield('script')
</body>
</html>