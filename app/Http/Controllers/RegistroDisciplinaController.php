<?php

namespace App\Http\Controllers;

use App\Horarios;
use App\Disciplina;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class RegistroDisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_representante = $request->get('id-representante');
        $id_deportista = $request->get('id-deportista');
        $disciplinas = Disciplina::lists('nombre','id_disciplina');

        return view('inscripcion.disciplina.index', compact('disciplinas', 'id_representante', 'id_deportista'));
    }

    public function getHorarios(Request $request, $id)
    {
        if($request->ajax()){
            $horarios = Horarios::horarios($id);
            return response()->json($horarios);
        }
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
        $date = Carbon::now();
        $ficha = \App\Ficha::create([
            'fecha' => $date->toDateString(),
            'estado' => '0',
            'deportista_id' => $request['id-deportista'],
            'representante_id' => $request['id-representante'],
            'disciplina_id' => $request['disciplina'],
            'horario_id' => $request['horario']
        ]);
        return redirect()->action('FichaInscripcionController@index', ['ficha' => $ficha]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
