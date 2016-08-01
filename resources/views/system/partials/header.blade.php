<div class="header-system">
    {!! link_to('#', $title = ' Nuevo', $attributes = ['id' => 'nuevo', 'class' => 'boton boton-primary icon-plus-circle'], $secure = null) !!}
    {!! Form::model(Request::only(['name']), ['method' => 'GET' ,'route' => $ruta, 'role' => 'search']) !!}
    <div class="form-item ed-container">
        <div class="ed-item base-70" style="display: flex">
            {!! Form::text('name', null, ['placeholder' => 'Buscar...']) !!}
            {!! link_to_route($ruta, $title = ' ', $parameters = [], $attributes = ['class' => 'icon-cancel']) !!}
        </div>
        <div class="ed-item base-20">
            {!! Form::submit('Buscar') !!}
        </div>
    {!! Form::close() !!}
    </div>
</div>