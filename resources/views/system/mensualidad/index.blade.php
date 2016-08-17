@extends('layouts.system')
@section('contenido')
    <h1>Mensualidades</h1>
    @include('system.partials.header', ['ruta' => 'system.mensualidad.index', 'campos' => ['ficha' => 'N° Ficha', 'disciplina' => 'Deporte', 'deportista' => 'Cédula o Apellido Deportista', 'representante' => 'Cédula o Apellido Representante']])
    <p class="info-register">Hay {{ $mensualidades->total() }} registros de mensualidades</p>
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Disciplina</th>
            <th>Deportista</th>
            <th>Representante</th>
            <th>Ficha N°</th>
            <th>Pagadas / Comprobante</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mensualidades as $mensualidad)
            @php ($lastmont = 0)
            <tr data-idm="{{ $mensualidad->id_mensualidad }}" data-idp="{{ $mensualidad->producto_id }}">
                <td>{{ $mensualidad->id_mensualidad }}</td>
                <td>{{ $mensualidad->ficha->disciplina->nombre }}</td>
                <td>{{ $mensualidad->ficha->deportista->apellido.' '.$mensualidad->ficha->deportista->nombre }}</td>
                <td>{{ $mensualidad->ficha->representante->apellido.' '.$mensualidad->ficha->representante->nombre }}</td>
                <td>{{ link_to('/system/pago-inscripcion?name='.$mensualidad->ficha->id_ficha.'&typesearch=ficha', $title = $mensualidad->ficha->id_ficha, $attributes = array(), $secure = null) }}</td>
                <td>
                    @if ($mensualidad->mensualidades == "{}")
                        Ninguna
                    @else
                        @foreach(json_decode($mensualidad->mensualidades, true) as $key => $value)
                            {{ $meses[$key] }} / {{ link_to('system/ventas?name='.$value, $title = 'Ver Comprobante', $attributes = ['style'=>'color: #D33574'], $secure = null) }}<br>
                            @php($lastmont = $key)
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($lastmont < 12)
                        <a href="/system/mensualidad/{{ $mensualidad->id_mensualidad }}/producto/{{ $mensualidad->producto_id }}" class="action-menu icon-money" title="Cobrar mensualidad"></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $mensualidades->appends(Request::all())->render() !!}
    </nav>
@endsection