@extends('layouts.app')
@section('bodypage')
    <body class="inicio">
@endsection
@section('contenido')
        <main class="ed-container">
            <div class="ed-item">
                <h1>ESCUELAS PERMANENTES "YO SOY FEDERIOS 2016"</h1>
                <div class="ed-container page-home">
                    <div class="ed-item">
                        <h2 class="page-home__title">Felicidades ya estas inscripto!!!</h2>
                        <h3>Por favor descarga e imprime la ficha de inscripción presionando en el botón Descargar Ficha</h3>

                        {{ link_to_action('FichaInscripcionController@show', $title = 'DESCARGAR FICHA DE INSCRIPCIÓN', $parameters = array($id), $attributes = array('class' => 'page-home__enlace')) }}
                        <a href="inscripcion/representante" class="page-home__enlace">NUEVA INSCRIPCIÓN?</a>
                        <p>Luego acércate a las oficinas de Federios ubicada en la Av. 6 de Octubre e Isaias Chopitea,
                            con la ficha de inscripción y la copia de la cedula del deportista y del representante (si es el caso),
                            para validar y cancelar los $12 incl. IVA de la inscripción.</p>
                    </div>
                </div>
            </div>
        </main>
@endsection