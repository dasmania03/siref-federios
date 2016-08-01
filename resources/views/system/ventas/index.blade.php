@extends('layouts.system')
@section('contenido')
    {{--@include('system.representante.partials.editmodal')--}}
    <h1>Ventas</h1>
    @include('system.partials.header', ['ruta' => 'system.ventas.index'])
    <p class="info-register">Hay {{ $ventas->total() }} ventas</p>
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>Concepto</th>
            <th>Detalle</th>
            <th>Valor</th>
            <th>Ficha</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
            <tr data-id="{{ $venta->id_venta }}">
                <td>{{ $venta->id_venta }}</td>
                <td>{{ $venta->fecha }}</td>
                <td>{{ $venta->concepto }}</td>
                <td>{{ $venta->detalle }}</td>
                <td>U$D {{ number_format($venta->precio, 2, '.', '') }}</td>
                <td>{{ link_to('/system/pago-inscripcion?name='.$venta->ficha_id, $title = $venta->ficha_id, $attributes = array(), $secure = null) }}</td>
                <td>
                    {{--<a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>--}}
                    <a href="ventas/printcomprobante/{{ $venta->id_venta }}" target="_blank" class="action-menu icon-print" title="Imprimir Comprobante"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $ventas->appends(Request::only(['name']))->render() !!}
    </nav>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.action-edit').click(function () {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var route = "/system/representante/"+ id +"/edit";

                $.get(route,function (resp) {
                    $("#ci-representante").val(resp.identificacion);
                    $("#apellidos-representante").val(resp.apellido);
                    $("#nombres-representante").val(resp.nombre);
                    $("#direccion-representante").val(resp.direccion);
                    $("#telefono-representante").val(resp.telefono);
                    $("#email-representante").val(resp.email);
                    $("#id-rep").val(resp.id_representante);
                });

                $('.popup-modal-edit').addClass('is-visible');
            });

            $('#actualizar').click(function () {
                var url = "/system/representante/"+ $("#id-rep").val();
                var data = $('#form-repres').serialize();
                $.post(url, data, function (result) {
                    $('.popup-modal-edit').removeClass('is-visible');
                    location.reload();
                }).fail(function () {
                    alert('Error, no se puede actualizar');
                })
            });
        });
    </script>
@endsection