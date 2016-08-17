@extends('layouts.system')
@section('contenido')
    <div id="muestra">
    <h1>Detalles de la Ficha N° {{ str_pad($ficha->id_ficha, 3, "0", STR_PAD_LEFT) }}</h1>
    <table class="listado listado-detalle">
        <thead>
            <tr><th colspan="2">DEPORTISTA</th></tr>
        </thead>
        <tbody>
            <tr><td style="font-weight: bold">CEDULA</td><td>{{ $ficha->deportista->identificacion }}</td></tr>
            <tr><td style="font-weight: bold">APELLIDOS Y NOMBRES</td><td>{{ $ficha->deportista->apellido.' '.$ficha->deportista->nombre }}</td></tr>
            <tr><td style="font-weight: bold">FECHA DE NACIMIENTO</td><td>{{ $ficha->deportista->fecha_nac }}</td></tr>
            <tr><td style="font-weight: bold">GENERO</td><td>{{ ($ficha->deportista->genero == 'M')? 'MASCULINO':'FEMENINO' }}</td></tr>
            <tr><td style="font-weight: bold">TALLA</td><td>{{ $ficha->deportista->talla }}</td></tr>
            <tr><td style="font-weight: bold">DIRECCION</td><td>{{ $ficha->deportista->direccion }}</td></tr>
            <tr><td style="font-weight: bold">TELEFONO</td><td>{{ $ficha->deportista->telefono }}</td></tr>
            <tr><td style="font-weight: bold">EMAIL</td><td>{{ $ficha->deportista->email }}</td></tr>
            <tr><td style="font-weight: bold">DISCAPACIDAD</td><td>{{ ($ficha->deportista->discapacidad)?'SI':'NO' }}</td></tr>
            <tr><td style="font-weight: bold">NUMERO DE CARNET CONADIS</td><td>{{ $ficha->deportista->num_carnet }}</td></tr>
            <tr><td style="font-weight: bold">TIPO DE DISCAPACIDAD</td><td>{{ $ficha->deportista->tipo_discapacidad }}</td></tr>
            <tr><td style="font-weight: bold">GRADO DE DISCAPACIDAD</td><td>{{ $ficha->deportista->grado_discapacidad }}</td></tr>
        </tbody>
    </table>
    <table class="listado listado-detalle">
        <thead>
        <tr><th colspan="2">REPRESENTANTE</th></tr>
        </thead>
        <tbody>
            <tr><td style="font-weight: bold">CEDULA</td><td>{{ $ficha->representante->identificacion }}</td></tr>
            <tr><td style="font-weight: bold">APELLIDOS Y NOMBRES</td><td>{{ $ficha->representante->apellido.' '.$ficha->representante->nombre }}</td></tr>
            <tr><td style="font-weight: bold">DIRECCION</td><td>{{ $ficha->representante->direccion }}</td></tr>
            <tr><td style="font-weight: bold">TELEFONO</td><td>{{ $ficha->representante->telefono }}</td></tr>
            <tr><td style="font-weight: bold">EMAIL</td><td>{{ $ficha->representante->email }}</td></tr>
        </tbody>
    </table>
    <table class="listado listado-detalle">
        <thead>
        <tr><th colspan="2">INSCRIPCION</th></tr>
        </thead>
        <tbody>
            <tr><td style="font-weight: bold">DISCIPLINA</td><td>{{ $ficha->disciplina->nombre }}</td></tr>
            <tr><td style="font-weight: bold">HORARIO</td><td>{{ $ficha->horario->nombre }}</td></tr>
        </tbody>
    </table>
    </div>
    <table class="listado" style="width: 50%">
        <tr><td>
                <a href="javascript:window.print()" class="boton boton-primary icon-print"> Imprimir</a>
        </td></tr>
    </table>
@endsection