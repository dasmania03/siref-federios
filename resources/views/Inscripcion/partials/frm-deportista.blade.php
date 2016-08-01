@if(isset($dep) && count($dep) > 0)
    {!! Form::open(['method' => 'PUT' ,'action' => ['RegistroDeportistaController@update', $dep[0]->id_deportista],'onsubmit'=>'return validarcedula("ci-deportista")', 'class' => 'form-registro']) !!}
@else
    {!! Form::open(['action' => 'RegistroDeportistaController@store' ,'onsubmit'=>'return validarcedula("ci-deportista")','class' => 'form-registro']) !!}
@endif
<div class="form-item ed-container">
    <div class="ed-item base-1-3">
        {!! Form::label('ci-deportista', 'Cedula *') !!}
        {!! Form::text('ci-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->identificacion : ((count($iddep) > 0) ? $iddep : ''), ['id' => 'ci-deportista','required', 'readonly']) !!}
    </div>
    <div class="ed-item base-1-3">
        {!! Form::label('talla-deportista', 'Talla *') !!}
        {!! Form::number('talla-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->talla : '24', ['min' => '24', 'max' => '46', 'step' => '2', 'id' => 'ci-deportista','required']) !!}
    </div>
    <div class="ed-item base-1-3">
        {!! Form::label('genero-deportista', 'Genero *') !!}
        {!! Form::select('genero-deportista', ['M' => 'Masculino', 'F' => 'Femenino'],  (isset($dep) && count($dep) > 0) ? $dep[0]->genero : null, ['id' => 'genero-deportista']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-50">
        {!! Form::label('apellidos-deportista', 'Apellidos *') !!}
        {!! Form::text('apellidos-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->apellido : '', ['id' => 'apellidos-deportista','required', (isset($dep) && count($dep) > 0) ? 'readonly' : '', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
    <div class="ed-item base-50">
        {!! Form::label('nombres-deportista', 'Nombres *') !!}
        {!! Form::text('nombres-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->nombre : '', ['id' => 'nombres-deportista','required', (isset($dep) && count($dep) > 0) ? 'readonly' : '', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-50">
        {!! Form::label('fechanac-deportista', 'Fecha de nacimiento *') !!}
        {!! Form::date('fechanac-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->fecha_nac : '', ['id' => 'fechanac-deportista','required', (isset($dep) && count($dep) > 0) ? 'readonly' : '']) !!}
{{--        {!! Form::text('fechanac-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->fecha_nac : '',['id' => 'fechanac-deportista', 'placeholder' => 'Date', 'onFocus' => '(this.type="date")']) !!}--}}
    </div>
    <div class="ed-item base-50">
        {!! Form::label('direccion-deportista', 'Dirección *') !!}
        {!! Form::text('direccion-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->direccion : '', ['id' => 'direccion-deportista','required', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-50">
        {!! Form::label('telefono-deportista', 'Teléfono') !!}
        {!! Form::text('telefono-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->telefono : '', ['id' => 'telefono-deportista']) !!}
    </div>
    <div class="ed-item base-50">
        {!! Form::label('email-deportista', 'Correo electrónico') !!}
        {!! Form::email('email-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->email : '', ['id' => 'email-deportista', 'onkeyup' => 'aMinus(event, this)']) !!}
    </div>
</div>
<div class="form-item ed-container">
    <div class="ed-item base-50">
        <div class="label-content">
        {!! Form::label('discapacidad-deportista', 'Discapacidad') !!}
        {!! Form::checkbox('discapacidad-deportista', 1, (isset($dep) && count($dep) > 0) ? (($dep[0]->discapacidad == 1) ? true : false): false, ['id' => 'discapacidad-deportista', 'class' => 'toggle-button', 'onchange' => 'showContent(this, "discapacidad")']) !!}
        <label for="discapacidad-deportista"></label>
        </div>
    </div>
</div>
<div id="discapacidad">
<div class="form-item ed-container">
    <div class="ed-item base-1-3">
        {!! Form::label('carnet-discapacidad', 'N° Carnet') !!}
        {!! Form::text('carnet-discapacidad', (isset($dep) && count($dep) > 0) ? $dep[0]->num_carnet : '', ['id' => 'carnet-discapacidad']) !!}
    </div>
    <div class="ed-item base-1-3">
        {!! Form::label('tipo-discapacidad', 'Tipo de discapacidad') !!}
        {!! Form::text('tipo-discapacidad', (isset($dep) && count($dep) > 0) ? $dep[0]->tipo_discapacidad : '', ['id' => 'tipo-discapacidad', 'onkeyup' => 'aMays(event, this)']) !!}
    </div>
    <div class="ed-item base-1-3">
        {!! Form::label('grado-discapacidad', 'Grado de discapacidad') !!}
        {!! Form::text('grado-discapacidad', (isset($dep) && count($dep) > 0) ? $dep[0]->grado_discapacidad : '', ['id' => 'grado-discapacidad']) !!}
    </div>
</div>
</div>
{!! Form::hidden('id-deportista', (isset($dep) && count($dep) > 0) ? $dep[0]->id_deportista : '') !!}
{!! Form::hidden('id-representante', (isset($idrp) && count($idrp) > 0) ? $idrp : '') !!}
<div class="ed-container">
    <div class="ed-item">
        {!! Form::submit((isset($dep) && count($dep) > 0)?'Continuar':'Guardar y Continuar') !!}
    </div>
</div>
{!! Form::close() !!}