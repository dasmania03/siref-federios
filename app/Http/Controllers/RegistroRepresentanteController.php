<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class RegistroRepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idrep = trim($request->get('search'));
        if($idrep) {
            $rep = \App\Representante::where('identificacion', trim($request->get('search')))->get();
            return view('inscripcion.representante.index', compact('rep','idrep'));
        }
        return view('inscripcion.representante.index');
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
        $repres = \App\Representante::create([
            'identificacion' => $request['ci-representante'],
            'apellido'=> $request['apellidos-representante'],
            'nombre'=> $request['nombres-representante'],
            'direccion'=> $request['direccion-representante'],
            'telefono'=> $request['telefono-representante'],
            'email' => $request['email-representante'],
        ]);

        return redirect()->action('RegistroDeportistaController@index', ['id-representante' => $repres['id_representante']]);
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
        $repup = \App\Representante::find($id);
        $repup->direccion = $request['direccion-representante'];
        $repup->telefono = $request['telefono-representante'];
        $repup->email = $request['email-representante'];
        $repup->save();
        return redirect()->action('RegistroDeportistaController@index', ['id-representante' => $request->get('id-representante')]);
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
