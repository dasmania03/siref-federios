@extends('layouts.system')
@section('contenido')
    @include('system.pagoinscripcion.partials.editmodal')
    @include('system.pagoinscripcion.partials.viewmodal')
    @include('system.pagoinscripcion.partials.salemodal')
    <h1>Módulo de Cobro de Inscripciones</h1>
    @include('system.partials.header', ['enlace' => ['url' => '/representante', 'title' => ' Nueva Ficha'] ,'ruta' => 'system.pago-inscripcion.index'])
    <p class="info-register">Hay {{ $fichas->total() }} fichas registradas</p>
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Deporte</th>
            <th>Horario</th>
            <th>Deportista</th>
            <th>Representante</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fichas as $ficha)
            <tr data-id="{{ $ficha->id_ficha }}" data-idd="{{ $ficha->id_disciplina }}" data-idh="{{ $ficha->id_horario }}">
                <td>{{$ficha->id_ficha}}</td>
                <td>{{$ficha->disciplina}}</td>
                <td>{{$ficha->horario}}</td>
                <td>{{$ficha->da}} {{$ficha->dn}}</td>
                <td>{{$ficha->ra}} {{$ficha->rn}}</td>
                <td><a href="{{ ($ficha->estado) ? '#0' : '#' }}" class="{{ ($ficha->estado) ? 'paid icon-check-circle' : 'no-paid icon-times-circle' }}" title="{{ ($ficha->estado) ? 'Pagada' : 'No pagada' }}"></a></td>
                <td>
                    <a href="#" class="action-menu action-plus icon-eye" title="Detalles"></a>
                    <a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>
                    <a href="pago-inscripcion/printficha/{{$ficha->id_ficha}}" target="_blank" class="action-menu icon-print" title="Imprimir Ficha"></a>
                    <a href="#" class="action-menu action-destroy icon-trash-o" title="Eliminar"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $fichas->appends(Request::only(['name']))->render() !!}
    </nav>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.no-paid').click(function () {
                var f = new Date();
                var row = $(this).parents('tr');
                var id = row.data('id');
                $("#fecha-comp").val(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
                $.get("/system/pago-inscripcion/"+id, function(resp,discp){
                    $('#detalle').val("Inscripcion a Escuela Permanente de "+resp.disciplina);
                    $('#idfc').val(resp.id_ficha);
                });
                $('.popup-modal-sale').addClass('is-visible');
                $('#valor').focus();
            });

            //Ejecutar venta
//            $('#sale-ficha').click(function () {
//                var url = "/system/pago-inscripcion";
//                var data = $('#form-sale').serialize();
//                var urlprint = "/system/ventas/printcomprobante/";
//                window.open("", "ventaan");
//                $.post(url, data, function (result) {
//
//                    $('.popup-modal-sale').removeClass('is-visible');
//                    location.reload();
//                }).fail(function () {
//                    alert('Error, no se puede actualizar');
//                });
//            });

            $('.action-edit').click(function () {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var idd = row.data('idd');
                var idh = row.data('idh');
                $.get("/horarios/"+idd+"",function(resp,disciplina){
                    $("#horario").empty();
                    for(i=0; i<resp.length;i++){
                        $("#horario").append("<option value='"+resp[i].id_horario+"'>"+resp[i].nombre+"</option>");
                    }
                    $("#horario > option[value='"+ idh +"']").attr('selected', 'selected');
                });
                $("#disciplina > option[value='"+ idd +"']").attr('selected', 'selected');
                $("#id-ficha").val(id);
                $('.popup-modal-edit').addClass('is-visible');
            });

            //Funcion para actualizar
            $('#actualizar').click(function () {
                var url = "/system/pago-inscripcion/"+ $("#id-ficha").val();
                var data = $('#form-ficha').serialize();
                $.post(url, data, function (result) {
                    $('.popup-modal-edit').removeClass('is-visible');
                    location.reload();
                }).fail(function () {
                    alert('Error, no se puede actualizar');
                })
            });

            //Funcion lanzar viewmodal
            $('.action-plus').click(function () {
                var row = $(this).parents('tr');
                var id = row.data('id');
                var route = "/system/pago-inscripcion/"+id;

                $.get(route,function (resp) {
                    $("#fecha").val(resp.fecha);
                    if (resp.estado == 0){
                        $("#estado").val("NO PAGADA");
                    } else {
                        $("#estado").val("PAGADA");
                    }
                    $("#ci-rep").val(resp.ri);
                    $("#ci-dep").val(resp.di);
                    $("#title").text("Datos de la Fich N° "+addCeros(resp.id_ficha,4));
                }).fail(function () {
                    alert('Error');
                });

                $('.popup-modal-show').addClass('is-visible');
            });
        });
    </script>
@endsection