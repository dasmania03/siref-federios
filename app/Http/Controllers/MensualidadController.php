<?php

namespace App\Http\Controllers;

use App\Mensualidad;
use Illuminate\Http\Request;

use App\Http\Requests;

class MensualidadController extends Controller
{
    public function index()
    {
        $mensualidades = Mensualidad::all();
        return view('system.mensualidad.index', compact('mensualidades'));
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
