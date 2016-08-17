@extends('layouts.system')
@section('contenido')
    <h2>Formulario de Cobro de Mensualidad</h2>
    {!! Form::open(['method' => 'POST' ,'action' => 'MensualidadController@store', 'id' => 'form-sale','class' => 'form-registro']) !!}
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('fecha-comp', 'Fecha') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::text('fecha-comp', date('d/m/Y'), ['id' => 'fecha-comp','readonly']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('concepto', 'Concepto') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::select('concepto', ['mensualidad' => 'Mensualidad'], null, ['id' => 'concepto']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('detalle', 'Detalle') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::textarea('detalle', 'Mensualidad de la Escuela Permanente de '.$producto->disciplina->nombre.' Mes pagado: '.$meses[$mes], ['id' => 'detalle', 'rows' => '3', 'required']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('valor', 'Valor a pagar U$D') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::text('valor', $producto->precio, ['id' => 'valor', 'class' => 'input-sale']) !!}
        </div>
    </div>
    {!! Form::hidden('idf',  $mensualidad->ficha_id,['id' => 'idf']) !!}
    {!! Form::hidden('idm',  $idm,['id' => 'idm']) !!}
    {!! Form::hidden('mes',  $mes,['id' => 'mes']) !!}
    <div class="ed-container">
        <div class="ed-item">
            {!! Form::submit('Registrar Pago') !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection