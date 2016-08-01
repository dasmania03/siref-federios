<div class="popup-modal-edit" role="alert">
    <div class="popup-modal-container">
        <div class="modal-container">
            <h2>Editar Deportista</h2>
            {!! Form::open(['method' => 'PUT' ,'url' => '#', 'id' => 'form-depor', 'class' => 'form-registro']) !!}
            <div class="form-item ed-container">
                <div class="ed-item base-1-3">
                    {!! Form::label('ci-deportista', 'Cedula') !!}
                    {!! Form::text('ci-deportista', null, ['id' => 'ci-deportista', 'readonly']) !!}
                </div>
                <div class="ed-item base-1-3">
                    {!! Form::label('talla-deportista', 'Talla') !!}
                    {!! Form::number('talla-deportista', null, ['min' => '24', 'max' => '46', 'step' => '2', 'id' => 'talla-deportista','required']) !!}
                </div>
                <div class="ed-item base-1-3">
                    {!! Form::label('genero-deportista', 'Genero') !!}
                    {!! Form::select('genero-deportista', ['M' => 'Masculino', 'F' => 'Femenino'],  null, ['id' => 'genero-deportista']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-50">
                    {!! Form::label('apellidos-deportista', 'Apellidos') !!}
                    {!! Form::text('apellidos-deportista', null, ['id' => 'apellidos-deportista','required', 'onkeyup' => 'aMays(event, this)']) !!}
                </div>
                <div class="ed-item base-50">
                    {!! Form::label('nombres-deportista', 'Nombres *') !!}
                    {!! Form::text('nombres-deportista', null, ['id' => 'nombres-deportista','required', 'onkeyup' => 'aMays(event, this)']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-50">
                    {!! Form::label('fechanac-deportista', 'Fecha de nacimiento *') !!}
                    {!! Form::date('fechanac-deportista', null, ['id' => 'fechanac-deportista','required']) !!}
                </div>
                <div class="ed-item base-50">
                    {!! Form::label('direccion-deportista', 'Dirección') !!}
                    {!! Form::text('direccion-deportista', null, ['id' => 'direccion-deportista','required', 'onkeyup' => 'aMays(event, this)']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-50">
                    {!! Form::label('telefono-deportista', 'Teléfono') !!}
                    {!! Form::text('telefono-deportista', null, ['id' => 'telefono-deportista']) !!}
                </div>
                <div class="ed-item base-50">
                    {!! Form::label('email-deportista', 'Correo electrónico') !!}
                    {!! Form::email('email-deportista', null, ['id' => 'email-deportista', 'onkeyup' => 'aMinus(event, this)']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-50">
                    <div class="label-content">
                        {!! Form::label('discapacidad-deportista', 'Discapacidad') !!}
                        {!! Form::checkbox('discapacidad-deportista', null, null, ['id' => 'discapacidad-deportista', 'class' => 'toggle-button', 'onchange' => 'showContent(this, "discapacidad")']) !!}
                        <label for="discapacidad-deportista"></label>
                    </div>
                </div>
            </div>
            <div id="discapacidad">
                <div class="form-item ed-container">
                    <div class="ed-item base-1-3">
                        {!! Form::label('carnet-discapacidad', 'N° Carnet') !!}
                        {!! Form::text('carnet-discapacidad', null, ['id' => 'carnet-discapacidad']) !!}
                    </div>
                    <div class="ed-item base-1-3">
                        {!! Form::label('tipo-discapacidad', 'Tipo de discapacidad') !!}
                        {!! Form::text('tipo-discapacidad', null, ['id' => 'tipo-discapacidad', 'onkeyup' => 'aMays(event, this)']) !!}
                    </div>
                    <div class="ed-item base-1-3">
                        {!! Form::label('grado-discapacidad', 'Grado de discapacidad') !!}
                        {!! Form::text('grado-discapacidad', null, ['id' => 'grado-discapacidad']) !!}
                    </div>
                </div>
            </div>
            {!! Form::hidden('id-deportista', null,['id' => 'id-dep']) !!}
            <div class="ed-container">
                <div class="ed-item">
                    {!! link_to('#', $title = 'Actualizar', $attributes = ['id' => 'actualizar', 'class' => 'boton boton-primary'], $secure = null) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <a href="#0" class="modal-close icon-cancel" title="Cerrar"></a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->














{{--<div class="form-item ed-container">--}}
    {{--<div class="ed-item base-20">{!! Form::label('', 'Representante') !!}</div>--}}
    {{--<div class="ed-item base-80">{!! Form::text('drn', null, ['id' => 'drn', 'readonly']) !!}</div>--}}
{{--</div>--}}
{{--<div class="form-item ed-container">--}}
    {{--<div class="ed-item base-25">{!! Form::label('', 'Fecha de nacimiento') !!}</div>--}}
    {{--<div class="ed-item base-20">{!! Form::text('dfnac', null, ['id' => 'dfnac', 'readonly']) !!}</div>--}}
    {{--<div class="ed-item base-10">{!! Form::label('', 'Genero') !!}</div>--}}
    {{--<div class="ed-item base-25">{!! Form::text('dgenero', null, ['id' => 'dgenero', 'readonly']) !!}</div>--}}
    {{--<div class="ed-item base-10">{!! Form::label('', 'Talla') !!}</div>--}}
    {{--<div class="ed-item base-10">{!! Form::text('dtalla', null, ['id' => 'dtalla', 'readonly']) !!}</div>--}}
{{--</div>--}}
{{--<div class="form-item ed-container">--}}
    {{--<div class="ed-item base-25">{!! Form::label('', 'Discapacidad') !!}</div>--}}
    {{--<div class="ed-item base-10">{!! Form::text('ddiscap', null, ['id' => 'ddiscap', 'readonly']) !!}</div>--}}
    {{--<div class="ed-item base-20">{!! Form::label('', 'N° Carnet') !!}</div>--}}
    {{--<div class="ed-item base-45">{!! Form::text('dncarnet', null, ['id' => 'dncarnet', 'readonly']) !!}</div>--}}
{{--</div>--}}
{{--<div class="form-item ed-container">--}}
    {{--<div class="ed-item base-25">{!! Form::label('', 'Tipo de discapacidad') !!}</div>--}}
    {{--<div class="ed-item base-20">{!! Form::text('dtipo', null, ['id' => 'dtipo', 'readonly']) !!}</div>--}}
    {{--<div class="ed-item base-30">{!! Form::label('', 'Grado de discapacidad') !!}</div>--}}
    {{--<div class="ed-item base-25">{!! Form::text('dgrado', null, ['id' => 'dgrado', 'readonly']) !!}</div>--}}
{{--</div>--}}