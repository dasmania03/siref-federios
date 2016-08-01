@extends('layouts.system')
@section('contenido')
    @include('system.deportista.partials.viewmodal')
    @include('system.deportista.partials.editmodal')
    <h1>Deportistas</h1>
    @include('system.partials.header', ['ruta' => 'system.deportista.index'])
    <p class="info-register">Hay {{ $deportistas->total() }} registos en total</p>
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
        @foreach($deportistas as $deportista)
            <tr data-id="{{ $deportista->id_deportista }}">
                <td>{{ $deportista->id_deportista }}</td>
                <td>{{ $deportista->identificacion }}</td>
                <td class="izquierda-texto">{{ $deportista->apellido }} {{$deportista->nombre}}</td>
                <td class="izquierda-texto">{{ $deportista->direccion }}</td>
                <td>{{ $deportista->telefono }}</td>
                <td>{{ $deportista->email }}</td>
                <td data-id="{{ $deportista->id_deportista }}">
                    <a href="#" class="cd-popup-trigger action-menu action-plus icon-eye" title="Detalles"></a>
                    <a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>
                    {{--<a href="#" class="action-menu action-delete icon-trash-o" title="Eliminar"></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $deportistas->appends(Request::only(['name']))->render() !!}
    </nav>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            // Funcion ajax para lanzar el formulario de editar
            $('.action-edit').click(function () {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var route = "/system/deportista/"+ id +"/edit";

                $.get(route,function (resp) {
                    $("#ci-deportista").val(resp.identificacion);
                    $("#talla-deportista").val(resp.talla);
                    $("#genero-deportista").val(resp.genero);
                    $("#apellidos-deportista").val(resp.apellido);
                    $("#nombres-deportista").val(resp.nombre);
                    $("#fechanac-deportista").val(resp.fecha_nac);
                    $("#direccion-deportista").val(resp.direccion);
                    $("#telefono-deportista").val(resp.telefono);
                    $("#email-deportista").val(resp.email);
                    if (resp.discapacidad == 0) {
                        $("#discapacidad-deportista").prop("checked", false);
                    } else {
                        $("#discapacidad-deportista").prop("checked", true);
                    }
                    $("#carnet-discapacidad").val(resp.num_carnet);
                    $("#tipo-discapacidad").val(resp.tipo_discapacidad);
                    $("#grado-discapacidad").val(resp.grado_discapacidad);
                    $("#id-dep").val(resp.id_deportista);
                });

                $('.popup-modal-edit').addClass('is-visible');
            });

            // Funcion para enviar orden de actualizar registro
            $('#actualizar').click(function () {
                var url = "/system/deportista/"+ $("#id-dep").val();
                var data = $('#form-depor').serialize();
                $.post(url, data, function (result) {
                    $('.popup-modal-edit').removeClass('is-visible');
                    location.reload();
                }).fail(function () {
                    alert('Error, no se puede actualizar el deportista');
                })
            });

            // Funcion ajax para vizualizar datos adicionales
            $('.action-plus').click(function () {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var route = "/system/deportista/"+id;

                $.get(route,function (resp) {
                    $("#drn").val(resp.ra+" "+resp.rn);
                    $("#dfnac").val(resp.dfn);
                    $("#dgenero").val(resp.dg);
                    $("#dtalla").val(resp.dta);
                    if (resp.discapacidad == 0){
                        $("#ddiscap").val("No");
                    } else {
                        $("#ddiscap").val("Si");
                    }
                    $("#dncarnet").val(resp.num_carnet);
                    $("#dtipo").val(resp.tipo_discapacidad);
                    $("#dgrado").val(resp.grado_discapacidad);
                }).fail(function () {
                    alert('Error');
                });

                $('.popup-modal-show').addClass('is-visible');
            });
        });
    </script>
@endsection