<?php

namespace App\Http\Controllers;

use App\Representante;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class RepresentanteController extends Controller
{
    public function index(Request $request)
    {
        $representantes = Representante::buscar($request->get('name'), $request->get('typesearch'))->orderby('id_representante', 'ASC')->paginate();
        return view('system.representante.index', compact('representantes'));
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
        $representante = Representante::find($id);

        return  response()->json(
            $representante->toArray()
        );
    }

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

    public function destroy($id)
    {
        //
    }
}
