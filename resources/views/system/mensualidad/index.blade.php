@extends('layouts.system')
@section('contenido')
    {{--@include('system.representante.partials.editmodal')--}}
    <h1>Mensualidades</h1>
    @include('system.partials.header', ['ruta' => 'system.mensualidad.index', 'campos' => ['ficha' => 'N° Ficha', 'disciplina' => 'Deporte', 'deportista' => 'Cédula o Apellido Deportista', 'representante' => 'Cédula o Apellido Representante']])
    <p class="info-register">Hay {{ $mensualidades->total() }} registros de mensualidades</p>
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
                <td>{{ $mensualidad->ficha->deportista->apellido }}</td>
                <td>
                    @if ($mensualidad->mensualidades == "{}")
                        Ninguna
                    @else
                        @foreach(json_decode($mensualidad->mensualidades, true) as $key => $value)
                            {{ $meses[$key] }} / {{ link_to('system/ventas?name='.$value, $title = 'Ver Comprobante', $attributes = ['style'=>'color: #D33574'], $secure = null) }}<br>
                        @endforeach
                    @endif
                </td>
                @foreach(json_decode($mconfig[0]->config, true) as $mes => $estado)
                    @if($estado == 1 && $mes <= date('n'))
                        @if ($mensualidad->mensualidades == "{}")
                            <td>Agosto</td>
                            <td>
                                <a href="#" class="action-menu action-edit icon-pencil-square-o" title="Editar"></a>
                                <a href="ventas/printcomprobante/{{ $mensualidad->id_mensualidad }}" target="_blank" class="action-menu icon-print" title="Imprimir Comprobante"></a>
                            </td>
                        @else
                            @foreach(json_decode($mensualidad->mensualidades, true) as $key => $value)
                                @if($mes == $key)
                                    <td>{{ $mensualidad->ficha->ventas->where('concepto', 'inscripcion') }}</td>
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach


            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $mensualidades->appends(Request::all())->render() !!}
    </nav>
@endsection