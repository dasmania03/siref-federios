<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Ficha;
use App\Mensualidad;
use App\Productos;
use App\Ventas;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagoFichaController extends Controller
{
    protected $meses;
    
    public function __construct(){
        $this->meses = ['1' => 'Enero','2' => 'Febrero','3' => 'Marzo','4' => 'Abril','5' => 'Mayo','6' => 'Junio','7' => 'Julio','8' => 'Agosto','9' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre'];
    }
    
    public function index(Request $request)
    {
        $meses = $this->meses;
        $fichas = Ficha::buscar($request->get('name'), $request->get('typesearch'))->orderby('id_ficha', 'ASC')->paginate();
        $disciplinas = Disciplina::lists('nombre','id_disciplina');
        return view('system.pagoinscripcion.index', compact('fichas', 'disciplinas', 'meses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $venta = Ventas::create([
            'fecha' => $request->get('fecha-comp'),
            'concepto' => $request->get('concepto'),
            'detalle' => $request->get('detalle'),
            'precio' => $request->get('valor'),
            'ficha_id' => $request->get('idfc'),
            'user_id' => $user['id'],
        ]);

        $ficha = Ficha::find($request->get('idfc'));
        $date = explode('-', $ficha->deportista->fecha_nac);
        $age = Carbon::createFromDate($date[0],$date[1],$date[2])->age;
        $productos = Productos::get();
        foreach ($productos as $producto){
            if($ficha->disciplina_id == $producto->disciplina_id){
                if(($age >= $producto->edad_min) && ($age <= $producto->edad_max)){
                    Mensualidad::create([
                        'ficha_id' => $ficha->id_ficha,
                        'producto_id' => $producto->id_producto,
                        'mes_inicio' => $request->get('monthly-payment'),
                        'mes_fin' => 12,
                        'mensualidades' => '{}'
                    ]);
                    break;
                }
            }
        }

        $ficha->estado = 1;
        $ficha->save();

        Session::flash('success_message', 'Venta realizada exitosamente, imprimir comprobante de pago, mensualidad actualizada');
        return view('system/pagoinscripcion/showcomprobante', ['idventa' => $venta['id_venta']]);
    }

    public function show($id)
    {
        $fichas = Ficha::join('deportista', 'ficha.deportista_id', '=', 'deportista.id_deportista')
            ->join('representante', 'ficha.representante_id', '=', 'representante.id_representante')
            ->join('disciplinas', 'ficha.disciplina_id', '=', 'disciplinas.id_disciplina')
            ->select('ficha.id_ficha', 'ficha.fecha', 'ficha.estado',
                'deportista.id_deportista','deportista.identificacion as di', 'deportista.talla as dta', 'deportista.genero as dg', 'deportista.apellido as da', 'deportista.nombre as dn',
                'representante.id_representante','representante.identificacion as ri', 'representante.apellido as ra', 'representante.nombre as rn',
                'disciplinas.nombre as disciplina')
            ->where('id_ficha', '=', $id)
            ->get();

        return response()->json($fichas['0']);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $ficha = \App\Ficha::find($id);
            $ficha->disciplina_id = $request['disciplina'];
            $ficha->horario_id = $request['horario'];
            $ficha->save();

            Session::flash('success_message', 'Ficha actualizada, vuelva a imprimir la ficha');
            return response()->json([
                "message" => "Ficha actualizada"
            ]);
        }
        Session::flash('error_message', 'Error al actualizar la ficha');
        return response()->json([
            "message" => "Error"
        ]);
    }

    public function destroy($id)
    {
        //
    }

    public function getPrintFicha($id){
        $ficha = Ficha::join('deportista', 'ficha.deportista_id', '=', 'deportista.id_deportista')
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
        return $pdf->stream();
    }
}
