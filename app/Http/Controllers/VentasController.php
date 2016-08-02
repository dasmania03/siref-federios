<?php

namespace App\Http\Controllers;

use App\Ventas;
use Illuminate\Http\Request;

use App\Http\Requests;

class VentasController extends Controller
{
    public function index(Request $request)
    {
        $ventas = Ventas::buscar($request->get('name'))->orderby('id_venta', 'ASC')->paginate();
        return view('system.ventas.index', compact('ventas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }

    public function getPrintComprobante($id)
    {
        $venta = Ventas::join('ficha', 'ventas.ficha_id', '=', 'ficha.id_ficha')
            ->join('representante', 'ficha.representante_id', '=', 'representante.id_representante')
            ->join('disciplinas', 'ficha.disciplina_id', '=', 'disciplinas.id_disciplina')
            ->select('ventas.id_venta', 'ventas.fecha', 'ventas.concepto', 'ventas.detalle', 'ventas.precio', 'ventas.ficha_id',
                'ficha.id_ficha', 'ficha.fecha', 'ficha.estado',
                'representante.apellido as ra', 'representante.nombre as rn',
                'disciplinas.nombre as disciplina')
            ->where('ventas.id_venta', '=', $id)->get();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('comprobante', compact('venta'));
        return $pdf->stream();
    }
}
