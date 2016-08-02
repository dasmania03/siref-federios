@extends('layouts.system')
@section('contenido')
    <h1>Editar Producto</h1>
    {!! Form::open(['method' => 'PUT', 'action' => ['ProductosController@update', $producto->id_producto], 'class' => 'form-registro']) !!}
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('deporte', 'Disciplina') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::select('deporte', $disciplinas, $producto->disciplina_id, ['id' => 'deporte']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('edmin', 'Edad Minima') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::text('edmin', $producto->edad_min, ['id' => 'edmin','required']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('edmax', 'Edad Maxima') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::text('edmax', $producto->edad_max, ['id' => 'edmax','required']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('detalle', 'Detalle') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::text('detalle', $producto->detalle, ['id' => 'detalle']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('precio', 'Precio') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::text('precio', $producto->precio, ['id' => 'precio','required']) !!}
        </div>
    </div>
    {!! Form::hidden('id-producto', $producto->id_producto) !!}
    <div class="ed-container">
        <div class="ed-item">
            {!! Form::submit('Guardar') !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection