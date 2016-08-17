<?php

namespace App\Http\Controllers;

use App\Ficha;
use Illuminate\Http\Request;

use App\Http\Requests;

class FichaController extends Controller
{
    public function index(Request $request){
        $fichas = Ficha::buscar($request->get('name'), $request->get('typesearch'))->where('estado', '1')->orderby('id_ficha', 'ASC')->paginate();
        return view('system.fichas.index', compact('fichas'));
    }
    
    public function  showdetails($id){
        $ficha = Ficha::Find($id);
        return view('system.fichas.showdetails', compact('ficha'));
    }
}
