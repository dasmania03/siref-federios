@extends('layouts.system')
@section('contenido')
    <h1>Lista de Productos</h1>
    @include('system.partials.header', ['enlace' => 'system/productos/create' ,'ruta' => 'system.productos.index'])
    <p class="info-register">Hay {{ $productos->total() }} productos</p>
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Disciplina</th>
            <th>Edad Minima</th>
            <th>Edad Maxima</th>
            <th>Detalle</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr data-id="{{ $producto->id_producto }}">
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->disciplina->nombre }}</td>
                <td>{{ $producto->edad_min }}</td>
                <td>{{ $producto->edad_max }}</td>
                <td>{{ $producto->detalle }}</td>
                <td>{{ $producto->precio }}</td>
                <td>
                    {{--<a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>--}}
                    <a href="productos/{{ $producto->id_producto }}/edit" class="action-menu icon-pencil-square-o" title="Editar Producto"></a>
                    <a href="#" class="action-menu delete-product icon-trash-o" title="Eliminar Producto"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $productos->render() !!}
    </nav>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete-product').click(function () {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var route = "/system/representante/"+ id +"/edit";

//                $.get(route,function (resp) {
//                    $("#ci-representante").val(resp.identificacion);
//                    $("#apellidos-representante").val(resp.apellido);
//                    $("#nombres-representante").val(resp.nombre);
//                    $("#direccion-representante").val(resp.direccion);
//                    $("#telefono-representante").val(resp.telefono);
//                    $("#email-representante").val(resp.email);
//                    $("#id-rep").val(resp.id_representante);
//                });

//                $('.popup-modal-edit').addClass('is-visible');
            });
        });
    </script>
@endsection