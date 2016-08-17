@extends('layouts.system')
@section('contenido')
    <h1>Nomina de Fichas Activas</h1>
    @include('system.partials.header', ['ruta' => 'system.productos.index', 'campos' => ['ficha' => 'N° Ficha', 'disciplina' => 'Deporte', 'deportista' => 'Cédula o Apellido Deportista', 'representante' => 'Cédula o Apellido Representante']])
    <p class="info-register">Hay {{ $fichas->total() }} fichas</p>
    <table class="listado">
        <thead>
        <tr>
            <th>N°</th>
            <th>Deporte</th>
            <th>Horario</th>
            <th>Deportista</th>
            <th>Representante</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fichas as $ficha)
            <tr>
                <td>{{ $ficha->id_ficha }}</td>
                <td>{{ $ficha->disciplina->nombre }}</td>
                <td>{{ $ficha->horario->nombre }}</td>
                <td>{{ $ficha->deportista->apellido }} {{ $ficha->deportista->nombre }}</td>
                <td>{{ $ficha->representante->apellido }} {{ $ficha->representante->nombre }}</td>
                <td>
                    <a href="/system/fichas/{{ $ficha->id_ficha }}" class="action-menu action-plus icon-eye" title="Detalles"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav role="navigation">
        {!! $fichas->appends(Request::all())->render() !!}
    </nav>
@endsection