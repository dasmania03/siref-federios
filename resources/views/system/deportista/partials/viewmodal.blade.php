<div class="popup-modal-show" role="alert">
    <div class="popup-modal-container">
        <div class="modal-container">
            <h2>Datos del deportista</h2>
            <div class="form-item ed-container">
                <div class="ed-item base-20">{!! Form::label('', 'Representante') !!}</div>
                <div class="ed-item base-80">{!! Form::text('drn', null, ['id' => 'drn', 'readonly']) !!}</div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-25">{!! Form::label('', 'Fecha de nacimiento') !!}</div>
                <div class="ed-item base-20">{!! Form::text('dfnac', null, ['id' => 'dfnac', 'readonly']) !!}</div>
                <div class="ed-item base-10">{!! Form::label('', 'Genero') !!}</div>
                <div class="ed-item base-25">{!! Form::text('dgenero', null, ['id' => 'dgenero', 'readonly']) !!}</div>
                <div class="ed-item base-10">{!! Form::label('', 'Talla') !!}</div>
                <div class="ed-item base-10">{!! Form::text('dtalla', null, ['id' => 'dtalla', 'readonly']) !!}</div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-25">{!! Form::label('', 'Discapacidad') !!}</div>
                <div class="ed-item base-10">{!! Form::text('ddiscap', null, ['id' => 'ddiscap', 'readonly']) !!}</div>
                <div class="ed-item base-20">{!! Form::label('', 'N° Carnet') !!}</div>
                <div class="ed-item base-45">{!! Form::text('dncarnet', null, ['id' => 'dncarnet', 'readonly']) !!}</div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-25">{!! Form::label('', 'Tipo de discapacidad') !!}</div>
                <div class="ed-item base-20">{!! Form::text('dtipo', null, ['id' => 'dtipo', 'readonly']) !!}</div>
                <div class="ed-item base-30">{!! Form::label('', 'Grado de discapacidad') !!}</div>
                <div class="ed-item base-25">{!! Form::text('dgrado', null, ['id' => 'dgrado', 'readonly']) !!}</div>
            </div>
        </div>
        <a href="#0" class="modal-close icon-cancel" title="Cerrar"></a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->