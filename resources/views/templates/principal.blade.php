<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    {!! Html::style('css/estilos.css') !!}
    {!! Html::style('https://file.myfontastic.com/gVhWFfTbY55yVaY7oxJaF3/icons.css') !!}
    <link rel="shortcut icon" href="/img/favicon.png">
    <title>Escuelas Permanentes - Federios</title>
</head>

@yield('bodypage')
<div id="carga"></div>

<header class="main-header">
    <div class="ed-container">
        <div class="ed-item"><img src="/img/logo.png" class="logo"/></div>
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
</body>
</html>