<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

use App\Http\Requests;

class ConfigController extends Controller
{
    public function showMensualidad(){
        $config = Config::find(1);
        return view('system.config.mensualidad', compact('config'));
    }
}
