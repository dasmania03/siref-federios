@extends('layouts.system')
@section('contenido')
    <h1>Nuevo Producto</h1>
    {!! Form::open(['action' => 'ProductosController@store' ,'class' => 'form-registro']) !!}
        <div class="form-item ed-container">
            <div class="ed-item base-30">
                {!! Form::label('deporte', 'Disciplina') !!}
            </div>
            <div class="ed-item base-70">
                {!! Form::select('deporte', $disciplinas, null, ['id' => 'deporte']) !!}
            </div>
        </div>
        <div class="form-item ed-container">
            <div class="ed-item base-30">
                {!! Form::label('edmin', 'Edad Minima') !!}
            </div>
            <div class="ed-item base-70">
                {!! Form::text('edmin', '', ['id' => 'edmin','required']) !!}
            </div>
        </div>
        <div class="form-item ed-container">
            <div class="ed-item base-30">
                {!! Form::label('edmax', 'Edad Maxima') !!}
            </div>
            <div class="ed-item base-70">
                {!! Form::text('edmax', '', ['id' => 'edmax','required']) !!}
            </div>
        </div>
        <div class="form-item ed-container">
            <div class="ed-item base-30">
                {!! Form::label('detalle', 'Detalle') !!}
            </div>
            <div class="ed-item base-70">
                {!! Form::text('detalle', '', ['id' => 'detalle']) !!}
            </div>
        </div>
        <div class="form-item ed-container">
            <div class="ed-item base-30">
                {!! Form::label('precio', 'Precio') !!}
            </div>
            <div class="ed-item base-70">
                {!! Form::text('precio', '', ['id' => 'precio','required']) !!}
            </div>
        </div>
        <div class="ed-container">
            <div class="ed-item">
                {!! Form::submit('Guardar') !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection