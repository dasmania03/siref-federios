<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Ventas;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VentasController extends Controller
{
    public function index(Request $request)
    {
        $ventas = Ventas::buscar($request->get('name'))->orderby('id_venta', 'ASC')->paginate();
        return view('system.ventas.index', compact('ventas'));
    }

    public function getPrintComprobante($id)
    {
        $venta = Ventas::Find($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('comprobante', compact('venta'))->setPaper('A4')->setOrientation('portrait');
        return $pdf->stream();
    }
    
    public function generateReport(){
        $disciplinas = Disciplina::lists('nombre','id_disciplina');
        return view('system.ventas.report', compact('disciplinas'));
    }

    public function report(Request $request)
    {
        $ventas = DB::table('ventas')
            ->join('ficha' ,'ventas.ficha_id' , '=', 'ficha.id_ficha')
            ->join('representante', 'ficha.representante_id', '=', 'representante.id_representante')
            ->select('ventas.fecha as fecha', 'ventas.id_venta as comp', 'representante.apellido as cliente', 'representante.identificacion', 'ventas.ficha_id', 'ventas.concepto', 'ventas.detalle', 'ventas.precio')
            ->whereBetween('ventas.fecha', [$request->get('date-from'), $request->get('date-up')])
            ->when($request->get('discipline') != "", function ($query) use ($request){
                return $query->where('ficha.disciplina_id', $request->get('discipline'));
            })
            ->when($request->get('concept') != "all", function ($query) use ($request){
                return $query->where('ventas.concepto', $request->get('concept'));
            })
            ->get();

        Excel::create('reportVentasSiref-'.date("d/m/Y"), function($excel) use ($ventas) {
            $excel->sheet('reporte', function ($sheet) use ($ventas) {
                //CONFIGURACION DE LA PAGINA//
                $sheet->setOrientation('landscape');
                $sheet->setPageMargin([1.91, 0.64, 1.91, 0.64]); // Set top, right, bottom, left
                // Set multiple column formats
                $sheet->setColumnFormat(array(
                    'A' => 'dd/mm/yy',
                    'B' => '@',
                    'C' => 'General',
                    'D' => '@',
                    'H' => '$#,##0_-',
                ));

                //DEFINIENDO LAS FILAS ESTATICAS
                $sheet->mergeCells('A1:H1');
                $sheet->mergeCells('A2:H2');
                $sheet->mergeCells('A'.(count($ventas) + 10).':H'.(count($ventas) + 10));

                $sheet->row(1, ['REPORTE DE VENTAS - ESCUELAS PERMANENTES 2016']);
                $sheet->cells('A1', function($cells) {
                    $cells->setFontFamily('Arial');
                    $cells->setFontSize(14);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });

                $sheet->row(2, [date('l').', '.date('j').' de '.date('F').' de '.date('Y')]);
                $sheet->cells('A2', function($cells) {
                    $cells->setFontFamily('Arial');
                    $cells->setFontSize(11);
                    $cells->setAlignment('right');
                });

                $sheet->row(4, ['Fecha', 'Num_Comp', 'Cliente', 'Identificacion', 'ID Ficha', 'Concepto', 'Detalle', 'Valor']);
                $sheet->cells('A4:H4', function($cells) {
                    $cells->setBackground('#BFBFBF');
                    $cells->setFontFamily('Arial');
                    $cells->setFontSize(12);
                    $cells->setFontWeight('bold');
                    $cells->setBorder('none', 'none', 'solid', 'none');
                });

                $sheet->row((count($ventas) + 10), ['Generado por: '.Auth::user()->username.' ! Siref.online - Sistema de registro online Escuelas Permanentes 2015']);
                $sheet->cells('A'.(count($ventas) + 10), function($cells) {
                    $cells->setFontColor('#7F7F7F');
                    $cells->setFontFamily('Arial');
                    $cells->setFontSize(8);
                });

                // IMPRIME REGISTROS
                $i = 5;
                $inscp = $mens = 0;
                foreach ($ventas as $venta){
                    $sheet->row($i, [
                        $venta->fecha,
                        str_pad($venta->comp, 6, "0", STR_PAD_LEFT),
                        $venta->cliente,
                        $venta->identificacion,
                        str_pad($venta->ficha_id, 5, "0", STR_PAD_LEFT),
                        $venta->concepto,
                        $venta->detalle,
                        $venta->precio
                    ]);
                    ($venta->concepto == 'inscripcion') ? $inscp = $inscp + $venta->precio : $mens = $mens + $venta->precio;
                    $i++;
                }

                //IMPRIME TOTALES
                $sheet->cell('G'.(count($ventas) + 6), function($cell) {$cell->setValue('SUBTOTAL INSCRIPCIONES'); });
                $sheet->cell('H'.(count($ventas) + 6), function($cell) use ($inscp) {$cell->setValue($inscp); });
                $sheet->cell('G'.(count($ventas) + 7), function($cell) {$cell->setValue('SUBTOTAL MENSUALIDADES'); });
                $sheet->cell('H'.(count($ventas) + 7), function($cell) use ($mens) {$cell->setValue($mens); });
                $sheet->cell('G'.(count($ventas) + 8), function($cell) {
                    $cell->setValue('TOTAL');
                    $cell->setBackground('#BFBFBF');
                    $cell->setBorder('solid', 'none', 'none', 'none');
                });
                $sheet->cell('H'.(count($ventas) + 8), function($cell) use ($inscp, $mens) {
                    $cell->setValue($inscp + $mens);
                    $cell->setBackground('#BFBFBF');
                    $cell->setBorder('solid', 'none', 'none', 'none');
                });

            });
        })->export($request->get('type-file'));
    }
}
