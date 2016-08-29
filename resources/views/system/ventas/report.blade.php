@extends('layouts.system')
@section('contenido')
    <h1>Reporte de Ventas</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'VentasController@report' ,'class' => 'form-registro']) !!}
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('fecha', 'Fecha (desde-hsta)') !!}
        </div>
        <div class="ed-item base-35">
           {!! Form::date('date-from', \Carbon\Carbon::now(), ['id' => 'date-from']) !!}
        </div>
        <div class="ed-item base-35">
            {!! Form::date('date-up', \Carbon\Carbon::now(), ['id' => 'date-up']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('discipline', 'Disciplina') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::select('discipline', $disciplinas, null, ['placeholder' => 'Todas', 'id' => 'discipline']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-30">
            {!! Form::label('concept', 'Concepto') !!}
        </div>
        <div class="ed-item base-70">
            {!! Form::select('concept', ['all' => 'Todos', 'inscripcion' => 'Inscripciones', 'mensualidad' => 'Mensualidades'], null, ['id' => 'concept']) !!}
        </div>
    </div>
    <div class="form-item ed-container">
        <div class="ed-item base-50 derecha-contenido">
            {!! Form::radio('type-file', 'xls', true, ['id'=>'tfxls', 'class' => 'type-file-icon']) !!}
            {!! Form::label('tfxls', ' ', ['class' => 'icon-file-excel-o']) !!}
        </div>
        <div class="ed-item base-50">
            {!! Form::radio('type-file', 'pdf', false, ['id'=>'tfpdf', 'class' => 'type-file-icon']) !!}
            {!! Form::label('tfpdf', ' ', ['class' => 'icon-file-pdf-o']) !!}
        </div>
    </div>
    <div class="ed-container">
        <div class="ed-item">
            {!! Form::submit('Generar Reporte') !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection