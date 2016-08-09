<?php

namespace App\Http\Controllers;

use App\Config;
use App\Mensualidad;
use Illuminate\Http\Request;

use App\Http\Requests;

class MensualidadController extends Controller
{
    public function index(Request $request)
    {
        $meses = ['1' => 'Enero','2' => 'Febrero','3' => 'Marzo','4' => 'Abril','5' => 'Mayo','6' => 'Junio','7' => 'Julio','8' => 'Agosto','9' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre'];
        $mconfig = Config::where('id_config', '1')->get();
        $mensualidades = Mensualidad::buscar($request->get('name'), $request->get('typesearch'))->orderby('id_mensualidad', 'ASC')->paginate();
        return view('system.mensualidad.index', compact('mensualidades', 'meses','mconfig'));
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
}
