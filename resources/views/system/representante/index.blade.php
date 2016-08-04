@extends('layouts.system')
@section('contenido')
    @include('system.representante.partials.editmodal')
    <h1>Representantes</h1>
    @include('system.partials.header', ['enlace' => ['url' => '#', 'title' => ' Nuevo Representante'] ,'ruta' => 'system.representante.index'])
    <p class="info-register">Hay {{ $representantes->total() }} registos en total</p>
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Cedula</th>
            <th>Apellidos y Nombres</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($representantes as $representante)
        <tr data-id="{{ $representante->id_representante }}">
            <td>{{$representante->id_representante}}</td>
            <td>{{$representante->identificacion}}</td>
            <td>{{$representante->apellido}} {{$representante->nombre}}</td>
            <td>{{$representante->direccion}}</td>
            <td>{{$representante->telefono}}</td>
            <td>{{$representante->email}}</td>
            <td>
                <a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $representantes->appends(Request::only(['name']))->render() !!}
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


{{--@if ($representantes->lastPage() > 1)--}}
{{--<ul class="cd-pagination no-space">--}}
{{--<li class="preav">--}}
{{--<a href="{{ $representantes->url(1) }}" class="{{ ($representantes->currentPage() == 1) ? 'disabled' : '' }}">Anterior</a>--}}
{{--</li>--}}
{{--@for ($i = 1; $i <= $representantes->lastPage(); $i++)--}}
{{--<li><a href="{{ $representantes->url($i) }}" class="{{ ($representantes->currentPage() == $i) ? ' current' : '' }}">{{ $i }}</a></li>--}}
{{--@endfor--}}
{{--<li class="preav">--}}
{{--<a href="{{ $representantes->url($representantes->currentPage()+1) }}" class="{{ ($representantes->currentPage() == $representantes->lastPage()) ? 'disabled' : '' }}">Siguiente</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--@endif--}}