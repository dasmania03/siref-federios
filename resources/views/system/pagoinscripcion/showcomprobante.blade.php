@extends('layouts.system')
@section('contenido')
    <div class="content-comprobante">
        <iframe src="/system/ventas/printcomprobante/{{ $idventa }}" frameborder="0" width="100%" height="auto" scrolling="yes"></iframe>
    </div>
@endsection