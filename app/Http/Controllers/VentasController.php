<?php

namespace App\Http\Controllers;

use App\Facades\NumtoLetter;
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
        $venta = Ventas::Find($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('comprobante', compact('venta'))->setPaper('A4')->setOrientation('portrait');
        return $pdf->stream();
    }
}
