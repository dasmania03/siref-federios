<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria';
    protected $primaryKey ='id_auditoria';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'usuario_id',
        'accion',
        'tabla',
        'anterior',
        'nuevo'
    ];
}