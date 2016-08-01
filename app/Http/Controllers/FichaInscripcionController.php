<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class FichaInscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('inscripcion.indexof', ['id' => $request->get('ficha')]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = DB::table('ficha')
            ->join('deportista', 'ficha.deportista_id', '=', 'deportista.id_deportista')
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
        return $pdf->download('fichaInscripcionEP2016.pdf');

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
        //
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
}
