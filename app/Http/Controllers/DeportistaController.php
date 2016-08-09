<?php

namespace App\Http\Controllers;

use App\Deportista;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class DeportistaController extends Controller
{
    public function index(Request $request)
    {
        $deportistas = Deportista::buscar($request->get('name'), $request->get('typesearch'))->orderby('id_deportista', 'ASC')->paginate();
        return view('system.deportista.index', compact('deportistas'));
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
        $deportistas = Deportista::join('representante', 'deportista.representante_id', '=', 'representante.id_representante')
            ->select('deportista.id_deportista as did' ,'deportista.identificacion as di', 'deportista.talla as dta', 'deportista.genero as dg', 'deportista.apellido as da', 'deportista.nombre as dn', 'deportista.fecha_nac as dfn', 'deportista.direccion as dd', 'deportista.telefono as dt', 'deportista.email as de', 'deportista.discapacidad', 'deportista.num_carnet', 'deportista.tipo_discapacidad', 'deportista.grado_discapacidad',
                'representante.id_representante as rid', 'representante.apellido as ra', 'representante.nombre as rn')
            ->where('deportista.id_deportista', '=', $id)
            ->get();

        return response()->json($deportistas['0']);
    }

    public function edit($id)
    {
        $deportistas = Deportista::find($id);

        return  response()->json(
            $deportistas->toArray()
        );
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $depup = Deportista::find($id);

            $depup->talla = $request['talla-deportista'];
            $depup->genero = $request['genero-deportista'];
            $depup->apellido = $request['apellidos-deportista'];
            $depup->nombre = $request['nombres-deportista'];
            $depup->fecha_nac = $request['fechanac-deportista'];
            $depup->direccion = $request['direccion-deportista'];
            $depup->telefono = $request['telefono-deportista'];
            $depup->email = $request['email-deportista'];
            $depup->email = $request['email-deportista'];
            $depup->discapacidad = ($request['discapacidad-deportista']) ? 1:0;
            $depup->num_carnet = $request['carnet-discapacidad'];
            $depup->tipo_discapacidad = $request['tipo-discapacidad'];
            $depup->grado_discapacidad = $request['grado-discapacidad'];
            $depup->save();

            Session::flash('success_message', 'Deportista actualizado');
            return response()->json([
                "message" => "Representante actualizado"
            ]);
        }
        Session::flash('error_message', 'Error no se puede actualizar');
        return response()->json([
            "message" => "Error"
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
