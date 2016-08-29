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
            <th>Mes(es) Pendiente(s)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mensualidades as $mensualidad)
            @php($lastmont = 0) {{--Guarda el ultimo mes pagado--}}
            @php($ok = false)
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
                            {{ $meses[$key] }} | {{ link_to('system/ventas?name='.$value, $title = '', $attributes = ['class' => 'action-menu icon-file-pdf-o', 'title' => 'Mostrar comprobante del mes de '.$meses[$key]], $secure = null) }}<br>
                            @php($lastmont = $key)
                        @endforeach
                    @endif
                </td>
                <td>
                    @for($i = $mensualidad->mes_inicio; $i<=$mensualidad->mes_fin; $i++)
                        @foreach(json_decode($mensualidad->mensualidades, true) as $key => $value)
                            @if($key == $i)
                                @php($ok = true)
                                @break
                            @endif
                        @endforeach
                        @if($ok)
                            @php($ok = false)
                        @else
                            {{ $meses[$i] }} | {{ link_to('/system/mensualidad/'.$mensualidad->id_mensualidad.'/producto/'.$mensualidad->producto_id.'/mes/'.$i, $title = '', $attributes = ['class' => 'action-menu icon-money', 'title' => 'Cobrar el mes de '.$meses[$i]]) }}<br>
                            @php($ok = false)
                        @endif
                        @if($i == date('n'))
                            @break
                        @endif
                    @endfor
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $mensualidades->appends(Request::all())->render() !!}
    </nav>
@endsection