{!! Form::open(['method' => 'GET', 'onsubmit'=>'return validarcedula("search")', 'class' => 'form-search', 'role' => 'search']) !!}
<div class="form-item ed-container">
    <div class="ed-item base-25">
        {!! Form::label('search','Cédula') !!}
    </div>
    <div class="ed-item base-55">
        {!! Form::text('search',null,['id' =>  'search']) !!}
    </div>
    {!! Form::hidden('id-representante', (isset($idrp)) ? $idrp : '') !!}
    <div class="ed-item base-20 buton-search">
        {!! Form::submit('Buscar') !!}
    </div>
</div>
{!! Form::close() !!}