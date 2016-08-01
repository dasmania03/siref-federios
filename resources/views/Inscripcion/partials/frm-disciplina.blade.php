{!! Form::open(['action' => 'RegistroDisciplinaController@store' ,'class' => 'form-registro']) !!}
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
            {!! Form::select('horario', [], null, ['placeholder' => 'Seleccione primero la disciplina...', 'id' => 'horario']) !!}
        </div>
    </div>
    {!! Form::hidden('id-deportista',  $id_deportista) !!}
    {!! Form::hidden('id-representante',  $id_representante) !!}
    <div class="ed-container">
        <div class="ed-item">
            {!! Form::submit('Inscribirse ahora') !!}
        </div>
    </div>
{!! Form::close() !!}