<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Productos;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ProductosController extends Controller
{
    public function index(Request $request)
    {
        $productos = Productos::orderby('id_producto', 'ASC')->paginate();
        return view('system.productos.index', compact('productos'));
    }

    public function create()
    {
        $disciplinas = Disciplina::orderby('nombre', 'ASC')->lists('nombre','id_disciplina');
        return view('system.productos.create', compact('disciplinas'));

    }

    public function store(Request $request)
    {
        $producto = Productos::create([
            'disciplina_id' => $request['deporte'],
            'edad_min' => $request['edmin'],
            'edad_max' => $request['edmax'],
            'detalle' => $request['detalle'],
            'precio' => $request['precio'],
        ]);

        Session::flash('success_message', 'Producto agregado correctamente');
        return redirect()->action('ProductosController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto = Productos::find($id);
        $disciplinas = Disciplina::orderby('nombre', 'ASC')->lists('nombre','id_disciplina');
        return view('system.productos.edit', compact('producto', 'disciplinas'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
        $producto->disciplina_id = $request['deporte'];
        $producto->edad_min = $request['edmin'];
        $producto->edad_max = $request['edmax'];
        $producto->detalle = $request['detalle'];
        $producto->precio = $request['precio'];
        $producto->save();

        Session::flash('success_message', 'Producto actualizado');
        return redirect()->action('ProductosController@index');
    }

    public function destroy($id)
    {
        //
    }
}
