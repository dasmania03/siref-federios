<div class="popup-modal-sale" role="alert">
    <div class="popup-modal-container">
        <div class="modal-container">
            <h2>Formulario de Cobro</h2>
            {!! Form::open(['method' => 'POST' ,'action' => 'PagoFichaController@store', 'id' => 'form-sale','class' => 'form-registro']) !!}
            <div class="form-item ed-container">
                <div class="ed-item base-30">
                    {!! Form::label('fecha-comp', 'Fecha') !!}
                </div>
                <div class="ed-item base-70">
                    {!! Form::text('fecha-comp', null, ['id' => 'fecha-comp','readonly']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-30">
                    {!! Form::label('concepto', 'Concepto') !!}
                </div>
                <div class="ed-item base-70">
                    {!! Form::select('concepto', ['inscripcion' => 'Inscripcion'], null, ['id' => 'concepto']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-30">
                    {!! Form::label('detalle', 'Detalle') !!}
                </div>
                <div class="ed-item base-70">
                    {!! Form::textarea('detalle', null, ['id' => 'detalle', 'rows' => '3', 'required']) !!}
                </div>
            </div>
            <div class="form-item ed-container">
                <div class="ed-item base-30">
                    {!! Form::label('valor', 'Valor a pagar U$D') !!}
                </div>
                <div class="ed-item base-70">
                    {!! Form::text('valor', '12.00', ['id' => 'valor', 'class' => 'input-sale']) !!}
                </div>
            </div>
            {!! Form::hidden('idfc',  null,['id' => 'idfc']) !!}
            <div class="ed-container">
                <div class="ed-item">
                    {!! Form::submit('Registrar Pago') !!}
{{--                    {!! link_to('#', $title = 'Registrar Pago', $attributes = ['id' => 'sale-ficha', 'class' => 'boton boton-primary'], $secure = null) !!}--}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <a href="#0" class="modal-close icon-cancel" title="Cerrar"></a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->