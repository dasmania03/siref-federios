@extends('layouts.app')
@section('bodypage')
    <body class="registro-representante">
    @stop
    @section('contenido')
        <main class="ed-container">
            <div class="ed-item">
                <h1>INSCRIPCIÓN ONLINE - ESCUELAS PERMANENTES</h1>
                <h2>Seleccione Disciplina y el Horarios</h2>

                @include('inscripcion.partials.frm-disciplina')

                @if(isset($rep) && count($rep) > 0)
                    @include('inscripcion.partials.frm-representante')
                @elseif(isset($rep) && count($rep) == 0)
                    <div class="error message icon-error">No se encuentra registrado, por favor llene el siguiente formulario y de clic en Continuar.</div>
                    @include('inscripcion.partials.frm-representante')
                @endif

            </div>
        </main>
@stop