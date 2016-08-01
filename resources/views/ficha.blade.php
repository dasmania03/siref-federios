<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/print.css"/>
    <title>Inscripción Escuela Permanente de {{ $ficha[0]->disciplina }}</title>
</head>
<body>
<header class="main-header">
        <div class="logo"><img src="img/logo.png" /></div>
</header>
<main>
    <div>
        <h1>INSCRIPCIÓN ONLINE - ESCUELAS PERMANENTES</h1>
        <h2>Ficha de Inscripción N° {{ str_pad($ficha[0]->id_ficha, 5, "0", STR_PAD_LEFT) }}</h2>
        <h3>Fecha de Inscripción {{ $ficha[0]->fecha }}</h3>
        <table class="imprimir">
            <thead>
            <tr>
                <th colspan="8">Datos del deportista</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="2" class="title">Identificación</td>
                <td colspan="2">{{ $ficha[0]->di }}</td>
                <td class="title">Talla</td>
                <td>{{ $ficha[0]->dta }}</td>
                <td class="title">Genero</td>
                <td>{{ $ficha[0]->dg }}</td>
            </tr>
            <tr>
                <td colspan="2" class="title">Apellidos</td>
                <td colspan="2">{{ $ficha[0]->da }}</td>
                <td colspan="2" class="title">Nombres</td>
                <td colspan="2">{{ $ficha[0]->dn }}</td>
            </tr>
            <tr>
                <td colspan="2" class="title">Fecha de Nacimiento</td>
                <td colspan="2">{{ $ficha[0]->dfn }}</td>
                <td colspan="2" class="title">Dirección</td>
                <td colspan="2">{{ $ficha[0]->dd }}</td>
            </tr>
            <tr>
                <td colspan="2" class="title">Teléfono</td>
                <td colspan="2">{{ $ficha[0]->dt }}</td>
                <td colspan="2" class="title">Correo Electrónico</td>
                <td colspan="2">{{ $ficha[0]->de }}</td>
            </tr>
            <tr>
                <td colspan="2" class="title">Discapacidad</td>
                <td colspan="2">{{ ($ficha[0]->discapacidad === 0 ? 'No' : 'Si') }}</td>
                <td colspan="2" class="title">Carnet Conadis</td>
                <td colspan="2">{{ $ficha[0]->num_carnet }}</td>
            </tr>
            <tr>
                <td colspan="2" class="title">Tipo de discapacidad</td>
                <td colspan="2">{{ $ficha[0]->tipo_discapacidad }}</td>
                <td colspan="2" class="title">Grado de discapacidad</td>
                <td colspan="2">{{ $ficha[0]->grado_discapacidad }}</td>
            </tr>
            </tbody>
        </table>
        <table class="imprimir">
            <thead>
            <tr>
                <th colspan="4">Datos del representante</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="2" class="title">Identificación</td>
                <td colspan="2">{{ $ficha[0]->ri }}</td>
            </tr>
            <tr>
                <td class="title">Apellidos</td>
                <td>{{ $ficha[0]->ra }}</td>
                <td class="title">Nombres</td>
                <td>{{ $ficha[0]->rn }}</td>
            </tr>
            <tr>
                <td colspan="2" class="title">Dirección</td>
                <td colspan="2">{{ $ficha[0]->rd }}</td>
            </tr>
            <tr>
                <td class="title">Teléfono</td>
                <td>{{ $ficha[0]->rt }}</td>
                <td class="title">Correo Electrónico</td>
                <td>{{ $ficha[0]->re }}</td>
            </tr>
            </tbody>
        </table>
        <table class="imprimir">
            <thead>
            <tr>
                <th colspan="4">Disciplina y Horario</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="title">Escuela o Disciplina</td>
                <td>{{ $ficha[0]->disciplina }}</td>
                <td class="title">Horario</td>
                <td>{{ $ficha[0]->horario }}</td>
            </tr>
            </tbody>
        </table>
        <table class="firma">
            <tr><td>{{ $ficha[0]->ra }} {{ $ficha[0]->rn }}</td></tr>
            <tr><td>CI: {{ $ficha[0]->ri }}</td></tr>
        </table>
        <p class="observacion">* Imprimir y presentar la ficha de inscripción, adjuntando copia de cedula (deportista y representante), de carnet de discapacidad (en caso de aplicar), a las oficinas de Federios ubicadas en Av. 6 Octubre e Isaías Chopitea.</p>
    </div>
</main>
<footer class="main-footer">
    <div>
        <p>&copy; Federacióon Deportiva de Los Ríos | Escuelas Permanentes Federios 2016</p>
    </div>
</footer>
</body>
</html>