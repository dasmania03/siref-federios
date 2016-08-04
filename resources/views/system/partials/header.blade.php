<div class="header-system">
    @if(isset($enlace))
        {!! link_to($enlace['url'], $title = $enlace['title'], $attributes = ['id' => 'nuevo', 'class' => 'boton boton-primary icon-plus-circle'], $secure = null) !!}
    @else
        <div></div>
    @endif
    {!! Form::model(Request::only(['name']), ['method' => 'GET' ,'route' => $ruta, 'role' => 'search']) !!}
    <div class="form-item ed-container">
        <div class="ed-item base-50" style="display: flex">
            {!! Form::text('name', null, ['placeholder' => 'Buscar...']) !!}
            {!! link_to_route($ruta, $title = ' ', $parameters = [], $attributes = ['class' => 'icon-cancel']) !!}
        </div>
        @if(isset($campos))
            <div class="ed-item base-30">
                {!! Form::select('typesearch', $campos, null, ['id' => 'typesearch']) !!}
            </div>
        @endif
        <div class="ed-item base-10">
            {!! Form::submit('Buscar') !!}
        </div>
    {!! Form::close() !!}
    </div>
</div>