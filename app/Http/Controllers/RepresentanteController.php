<?php

namespace App\Http\Controllers;

use App\Representante;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $representantes = Representante::buscar($request->get('name'))->orderby('id_representante', 'ASC')->paginate();
        return view('system.representante.index', compact('representantes'));
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
        $representante = Representante::find($id);

        return  response()->json(
            $representante->toArray()
        );
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
        if($request->ajax()){
            $repup = Representante::find($id);
            $repup->apellido = $request['apellidos-representante'];
            $repup->nombre = $request['nombres-representante'];
            $repup->direccion = $request['direccion-representante'];
            $repup->telefono = $request['telefono-representante'];
            $repup->email = $request['email-representante'];
            $repup->save();

            Session::flash('success_message', 'Representante actualizado');
            return response()->json([
                "message" => "Representante actualizado"
            ]);
        }
        Session::flash('error_message', 'Error no se puede actualizar');
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
}
