<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    {!! Html::style('css/estilos.css') !!}
    {!! Html::style('https://file.myfontastic.com/H5wukG4FXB5y6c5jr2DXMJ/icons.css') !!}
    <link rel="shortcut icon" href="/img/favicon.png">
    <title>Escuelas Permanentes - Federios</title>
</head>
{{--<body id="app-layout">--}}
@yield('bodypage'){{--Debo poner el body en cada pagina--}}
<div id="carga"></div>

<header class="main-header">
    <div class="ed-container">
        <div class="ed-item base-1-3 top-menu">
            <div class="top-menu-item">
                <a href="{{ url('/') }}">Inicio</a>
                @if (!Auth::guest())
                    <a href="{{ url('/home') }}">Ir al Sistema</a>
                @endif
            </div>
        </div>
        <div class="ed-item base-1-3">
            <img src="/img/logo.png" class="logo"/>
        </div>
        <div class="ed-item base-1-3 top-menu">
            @if (Auth::guest())
                <div class="top-menu-item right">
                    <a href="{{ url('/login') }}">Ingresar</a>
                </div>
            @else
                <div class="top-menu-item">
                    <a href="#">Bienvenido, {{ Auth::user()->name }}</a>
                    <a href="{{ url('/logout') }}">Cerrar sesión</a>
                </div>
            @endif
        </div>
    </div>
</header>

@yield('contenido')

<footer class="main-footer">
    <div class="ed-container">
        <div class="ed-item">
            <p>&copy; Federacióon Deportiva de Los Ríos | Escuelas Permanentes Federios 2016</p>
        </div>
    </div>
</footer>
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/efectos.js') !!}
{!! Html::script('js/scripts.js') !!}
{!! Html::script('js/jquery.maskMoney.min.js') !!}
@yield('script')
</body>
</html>


{{--// ENLACE PARA REGISTRO DE USUARIO--}}
{{--<a href="{{ url('/register') }}">Register</a>--}}