<div class="popup-modal-edit" role="alert">
    <div class="popup-modal-container">
        <div class="modal-container">
            <h2>Editar Representante</h2>
            {!! Form::open(['method' => 'PUT' ,'url' => '#', 'id' => 'form-repres','class' => 'form-registro']) !!}
            <div class="form-item ed-container">
                <div class="ed-item base-15">
                    {!! Form::label('ci-representante', 'Cedula') !!}
                </div>
                <div class="ed-item base-85">
                    {!! Form::text('ci-representante', null, ['id' => 'ci-representante', 'readonly']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-50">
                    {!! Form::label('apellidos-representante', 'Apellidos *') !!}
                    {!! Form::text('apellidos-representante', null, ['id' => 'apellidos-representante','required', 'onkeyup' => 'aMays(event, this)']) !!}
                </div>
                <div class="ed-item base-50">
                    {!! Form::label('nombres-representante', 'Nombres *') !!}
                    {!! Form::text('nombres-representante', null, ['id' => 'nombres-representante','required', 'onkeyup' => 'aMays(event, this)']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-100">
                    {!! Form::label('direccion-representante', 'Dirección *') !!}
                    {!! Form::text('direccion-representante', null, ['id' => 'direccion-representante','required', 'onkeyup' => 'aMays(event, this)']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-50">
                    {!! Form::label('telefono-representante', 'Teléfono') !!}
                    {!! Form::text('telefono-representante', null, ['id' => 'telefono-representante']) !!}
                </div>
                <div class="ed-item base-50">
                    {!! Form::label('email-representante', 'Correo electrónico') !!}
                    {!! Form::email('email-representante', null, ['id' => 'email-representante', 'onkeyup' => 'aMinus(event, this)']) !!}
                </div>
            </div>
            {!! Form::hidden('id-representante', null,['id' => 'id-rep']) !!}
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