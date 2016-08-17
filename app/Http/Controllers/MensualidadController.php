<?php

namespace App\Http\Controllers;

use App\Config;
use App\Mensualidad;
use App\Productos;
use App\Ventas;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MensualidadController extends Controller
{
    protected $meses;

    public function __construct(){
        $this->meses = ['1' => 'Enero','2' => 'Febrero','3' => 'Marzo','4' => 'Abril','5' => 'Mayo','6' => 'Junio','7' => 'Julio','8' => 'Agosto','9' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre'];
    }

    public function index(Request $request)
    {
        $meses = $this->meses;
        $mconfig = Config::where('id_config', '1')->get();
        $mensualidades = Mensualidad::buscar($request->get('name'), $request->get('typesearch'))->orderby('id_mensualidad', 'ASC')->paginate();
        return view('system.mensualidad.index', compact('mensualidades', 'meses','mconfig'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $venta = Ventas::create([
            'fecha' => $request['fecha-comp'],
            'concepto' => $request['concepto'],
            'detalle' => $request['detalle'],
            'precio' => $request['valor'],
            'ficha_id' => $request['idf'],
            'user_id' => $user['id'],
        ]);

        $mensualidad = Mensualidad::find($request['idm']);
        $mensualidades = json_decode($mensualidad->mensualidades, true);
        $mensualidades[$request['mes']] = $venta['id_venta'];
        $mensualidad->mensualidades = json_encode($mensualidades);
        $mensualidad->save();

        Session::flash('success_message', 'Mensualidad realizada exitosamente, imprimir comprobante de pago, mensualidad actualizada');
        return view('system/mensualidad/showcomprobante', ['idventa' => $venta['id_venta']]);
    }

    public function getDataMes($idm, $idp){
        $meses = $this->meses;
        $producto = Productos::find($idp);
        $mensualidad = Mensualidad::find($idm);
        $mensualidades = json_decode($mensualidad->mensualidades, true);
        if(empty($mensualidades)){
            $mes = date("n"); // todo Hay que calcular
        } else {
            end( $mensualidades );
            $mes = key($mensualidades) + 1;
        }
        return view('system.mensualidad.create', compact('idm', 'producto', 'mensualidad','meses', 'mes'));
    }

    public function getPrintComprobante($id)
    {
        $venta = Ventas::Find($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('comprobante', compact('venta'))->setPaper('A4')->setOrientation('portrait');
        return $pdf->stream();
    }
}
