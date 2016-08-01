@extends('layouts.app')
@section('bodypage')
    <body class="registro-deportista">
    @stop
    @section('contenido')
        <main class="ed-container">
            <div class="ed-item">
                <h1>INSCRIPCIÓN ONLINE - ESCUELAS PERMANENTES</h1>
                <h2>Datos del deportista</h2>

                @include('inscripcion.partials.frmsearch', ['idrp' => $id_representante])

                @if(isset($dep) && count($dep) > 0)
                    @include('inscripcion.partials.frm-deportista', ['idrp' => $id_representante])
                @elseif(isset($dep) && count($dep) == 0)
                    <div class="error message icon-error">No se encuentra registrado, por favor llene el siguiente formulario y de clic en Continuar.</div>
                    @include('inscripcion.partials.frm-deportista', ['idrp' => $id_representante])
                @endif

            </div>
        </main>
@stop