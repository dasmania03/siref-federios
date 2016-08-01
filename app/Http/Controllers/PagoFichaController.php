<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Ficha;
use App\Ventas;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagoFichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fichas = Ficha::join('deportista', 'ficha.deportista_id', '=', 'deportista.id_deportista')
            ->join('representante', 'ficha.representante_id', '=', 'representante.id_representante')
            ->join('disciplinas', 'ficha.disciplina_id', '=', 'disciplinas.id_disciplina')
            ->join('horarios', 'ficha.horario_id', '=', 'horarios.id_horario')
            ->select('ficha.id_ficha', 'ficha.fecha', 'ficha.estado',
                'deportista.id_deportista','deportista.identificacion as di', 'deportista.talla as dta', 'deportista.genero as dg', 'deportista.apellido as da', 'deportista.nombre as dn', 'deportista.fecha_nac as dfn', 'deportista.direccion as dd', 'deportista.telefono as dt', 'deportista.email as de', 'deportista.discapacidad', 'deportista.num_carnet', 'deportista.tipo_discapacidad', 'deportista.grado_discapacidad',
                'representante.id_representante','representante.identificacion as ri', 'representante.apellido as ra', 'representante.nombre as rn', 'representante.direccion as rd', 'representante.telefono as rt', 'representante.email as re',
                'disciplinas.id_disciplina','disciplinas.nombre as disciplina', 'horarios.id_horario','horarios.nombre as horario')
            ->buscar($request->get('name'))
            ->orderBy('id_ficha', 'ASC')
            ->paginate();

        $disciplinas = Disciplina::lists('nombre','id_disciplina');
        return view('system.pagoinscripcion.index', compact('fichas', 'disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $venta = Ventas::create([
            'fecha' => $request['fecha-comp'],
            'concepto' => $request['concepto'],
            'detalle' => $request['detalle'],
            'precio' => $request['valor'],
            'ficha_id' => $request['idfc'],
            'user_id' => $user['id'],
        ]);

        $ficha = \App\Ficha::find($request['idfc']);
        $ficha->estado = 1;
        $ficha->save();

        Session::flash('success_message', 'Venta realizada exitosamente, imprimir comprobante de pago');
        return view('system/pagoinscripcion/showcomprobante', ['idventa' => $venta['id_venta']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fichas = Ficha::join('deportista', 'ficha.deportista_id', '=', 'deportista.id_deportista')
            ->join('representante', 'ficha.representante_id', '=', 'representante.id_representante')
            ->join('disciplinas', 'ficha.disciplina_id', '=', 'disciplinas.id_disciplina')
            ->select('ficha.id_ficha', 'ficha.fecha', 'ficha.estado',
                'deportista.id_deportista','deportista.identificacion as di', 'deportista.talla as dta', 'deportista.genero as dg', 'deportista.apellido as da', 'deportista.nombre as dn',
                'representante.id_representante','representante.identificacion as ri', 'representante.apellido as ra', 'representante.nombre as rn',
                'disciplinas.nombre as disciplina')
            ->where('id_ficha', '=', $id)
            ->get();

        return response()->json($fichas['0']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $ficha = \App\Ficha::find($id);
            $ficha->disciplina_id = $request['disciplina'];
            $ficha->horario_id = $request['horario'];
            $ficha->save();

            Session::flash('success_message', 'Ficha actualizada, vuelva a imprimir la ficha');
            return response()->json([
                "message" => "Ficha actualizada"
            ]);
        }
        Session::flash('error_message', 'Error al actualizar la ficha');
        return response()->json([
            "message" => "Error"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPrintFicha($id){
        $ficha = Ficha::join('deportista', 'ficha.deportista_id', '=', 'deportista.id_deportista')
            ->join('representante', 'ficha.representante_id', '=', 'representante.id_representante')
            ->join('disciplinas', 'ficha.disciplina_id', '=', 'disciplinas.id_disciplina')
            ->join('horarios', 'ficha.horario_id', '=', 'horarios.id_horario')
            ->select('ficha.id_ficha', 'ficha.fecha', 'ficha.estado',
                'deportista.identificacion as di', 'deportista.talla as dta', 'deportista.genero as dg', 'deportista.apellido as da', 'deportista.nombre as dn', 'deportista.fecha_nac as dfn', 'deportista.direccion as dd', 'deportista.telefono as dt', 'deportista.email as de', 'deportista.discapacidad', 'deportista.num_carnet', 'deportista.tipo_discapacidad', 'deportista.grado_discapacidad',
                'representante.identificacion as ri', 'representante.apellido as ra', 'representante.nombre as rn', 'representante.direccion as rd', 'representante.telefono as rt', 'representante.email as re',
                'disciplinas.nombre as disciplina', 'horarios.nombre as horario')
            ->where('ficha.id_ficha', '=', $id)->get();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('ficha', compact('ficha'));
        return $pdf->stream();
    }
}
