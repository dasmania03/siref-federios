<div class="popup-modal-edit" role="alert">
    <div class="popup-modal-container">
        <div class="modal-container">
            <h2>Editar Disciplina y Horario</h2>
            {!! Form::open(['method' => 'PUT' ,'url' => '#', 'id' => 'form-ficha','class' => 'form-registro']) !!}
            <div class="form-item ed-container">
                <div class="ed-item base-30">
                    {!! Form::label('disciplina', 'Escuela o Disciplina') !!}
                </div>
                <div class="ed-item base-70">
                    {!! Form::select('disciplina', $disciplinas, null, ['id' => 'disciplina']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-30">
                    {!! Form::label('horario', 'Horarios disponibles') !!}
                </div>
                <div class="ed-item base-70">
                    {!! Form::select('horario', [], null, ['id' => 'horario']) !!}
                </div>
            </div>
            {!! Form::hidden('id-ficha',  null,['id' => 'id-ficha']) !!}
            <div class="ed-container">
                <div class="ed-item">
                    {!! link_to('#', $title = 'Guardar cambios', $attributes = ['id' => 'actualizar', 'class' => 'boton boton-primary'], $secure = null) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <a href="#0" class="modal-close icon-cancel" title="Cerrar"></a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->