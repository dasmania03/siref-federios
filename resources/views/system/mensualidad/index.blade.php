@extends('layouts.system')
@section('contenido')
    {{--@include('system.representante.partials.editmodal')--}}
    <h1>Mensualidades</h1>
    @include('system.partials.header', ['ruta' => 'system.ventas.index', 'campos' => ['ficha' => 'Ficha', 'disciplina' => 'Deporte']])
    {{--<p class="info-register">Hay {{ $ventas->total() }} ventas</p>--}}
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Disciplina</th>
            <th>Deportista</th>
            <th>Pagadas / Recibo</th>
            <th>Pendiente</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mensualidades as $mensualidad)
            <tr data-id="{{ $mensualidad->id_mensualidad }}">
                <td>{{ $mensualidad->id_mensualidad }}</td>
                <td>{{ $mensualidad->ficha->disciplina->nombre }}</td>
                <td>{{ $mensualidad->producto_id }}</td>
                <td>
                    <a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>
                    <a href="ventas/printcomprobante/{{ $mensualidad->id_mensualidad }}" target="_blank" class="action-menu icon-print" title="Imprimir Comprobante"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
{{--        {!! $ventas->appends(Request::only(['name']))->render() !!}--}}
    </nav>
@endsection