<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class RegistroDeportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_representante = $request->get('id-representante');
        $iddep = trim($request->get('search'));
        if($iddep) {
            $dep = \App\Deportista::where('identificacion', trim($request->get('search')))->get();
            return view('inscripcion.deportista.index', compact('dep','id_representante','iddep'));
        }
        return view('inscripcion.deportista.index', ['id_representante' => $id_representante]);
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
        $depres = \App\Deportista::create([
            'identificacion' => $request['ci-deportista'],
            'talla' => $request['talla-deportista'],
            'genero' => $request['genero-deportista'],
            'apellido'=> $request['apellidos-deportista'],
            'nombre'=> $request['nombres-deportista'],
            'fecha_nac'=> $request['fechanac-deportista'],
            'direccion'=> $request['direccion-deportista'],
            'telefono'=> $request['telefono-deportista'],
            'email' => $request['email-deportista'],
            'discapacidad' => ($request['discapacidad-deportista']) ? 1:0,
            'num_carnet' => $request['carnet-discapacidad'],
            'tipo_discapacidad' => $request['tipo-discapacidad'],
            'grado_discapacidad' => $request['grado-discapacidad'],
            'representante_id' => $request['id-representante'],
        ]);
        
        return redirect()->action('RegistroDisciplinaController@index', ['id-deportista' => $depres['id_deportista'], 'id-representante' => $request['id-representante']]);
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
        $depup = \App\Deportista::find($id);
        $depup->talla = $request['talla-deportista'];
        $depup->genero = $request['genero-deportista'];
        $depup->direccion = $request['direccion-deportista'];
        $depup->telefono = $request['telefono-deportista'];
        $depup->email = $request['email-deportista'];
        $depup->discapacidad = ($request['discapacidad-deportista'] == '1') ? 1:0;
        $depup->num_carnet = $request['carnet-discapacidad'];
        $depup->tipo_discapacidad = $request['tipo-discapacidad'];
        $depup->grado_discapacidad = $request['grado-discapacidad'];
        $depup->representante_id = $request['id-representante'];
        $depup->save();

        return redirect()->action('RegistroDisciplinaController@index', ['id-deportista' => $request->get('id-deportista'), 'id-representante' => $request->get('id-representante')]);
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
