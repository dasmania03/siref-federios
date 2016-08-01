@if(isset($rep) && count($rep) > 0)
    {{--Utilizado para actualizar el representante--}}
    {!! Form::open(['method' => 'PUT' ,'action' => ['RegistroRepresentanteController@update', $rep[0]->id_representante], 'onsubmit'=>'return validarcedula("ci-representante")', 'class' => 'form-registro']) !!}
@else
    {!! Form::open(['action' => 'RegistroRepresentanteController@store', 'onsubmit'=>'return validarcedula("ci-representante")', 'class' => 'form-registro']) !!}
@endif
<div class="form-item ed-container">
    <div class="ed-item base-15">
        {!! Form::label('ci-representante', 'Cedula *') !!}
    </div>
    <div class="ed-item base-85">
        {!! Form::text('ci-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->identificacion : ((count($idrep) > 0) ? $idrep : ''), ['id' => 'ci-representante','required', 'readonly']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-50">
        {!! Form::label('apellidos-representante', 'Apellidos *') !!}
        {!! Form::text('apellidos-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->apellido : '', ['id' => 'apellidos-representante','required', (isset($rep) && count($rep) > 0) ? 'readonly' : '', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
    <div class="ed-item base-50">
        {!! Form::label('nombres-representante', 'Nombres *') !!}
        {!! Form::text('nombres-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->nombre : '', ['id' => 'nombres-representante','required', (isset($rep) && count($rep) > 0) ? 'readonly' : '', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-100">
        {!! Form::label('direccion-representante', 'Dirección *') !!}
        {!! Form::text('direccion-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->direccion : '', ['id' => 'direccion-representante','required', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-50">
        {!! Form::label('telefono-representante', 'Teléfono') !!}
        {!! Form::text('telefono-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->telefono : '', ['id' => 'telefono-representante']) !!}
    </div>
    <div class="ed-item base-50">
        {!! Form::label('email-representante', 'Correo electrónico') !!}
        {!! Form::email('email-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->email : '', ['id' => 'email-representante', 'onkeyup' => 'aMinus(event, this)']) !!}
    </div>
</div>
{!! Form::hidden('id-representante', (isset($rep) && count($rep) > 0) ? $rep[0]->id_representante : '') !!}
<div class="ed-container">
    <div class="ed-item">
        {!! Form::submit((isset($rep) && count($rep) > 0)?'Continuar':'Guardar y Continuar') !!}
    </div>
</div>
{!! Form::close() !!}