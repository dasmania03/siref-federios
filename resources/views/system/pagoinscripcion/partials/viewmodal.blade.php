<div class="popup-modal-show" role="alert">
    <div class="popup-modal-container">
        <div class="modal-container">
            <h2 id="title">Datos de la ficha N° 001</h2>
            <div class="form-item ed-container">
                <div class="ed-item base-25">{!! Form::label('', 'Fecha de inscripción') !!}</div>
                <div class="ed-item base-30">{!! Form::text('fecha', null, ['id' => 'fecha', 'readonly']) !!}</div>
                <div class="ed-item base-15">{!! Form::label('', 'Estado') !!}</div>
                <div class="ed-item base-30">{!! Form::text('estado', null, ['id' => 'estado', 'readonly']) !!}</div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-25">{!! Form::label('', 'CI del Representante') !!}</div>
                <div class="ed-item base-25">{!! Form::text('ci-rep', null, ['id' => 'ci-rep', 'readonly']) !!}</div>
                <div class="ed-item base-25">{!! Form::label('', 'CI del deportista') !!}</div>
                <div class="ed-item base-25">{!! Form::text('ci-dep', null, ['id' => 'ci-dep', 'readonly']) !!}</div>
            </div>
        </div>
        <a href="#0" class="modal-close icon-cancel" title="Cerrar"></a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->