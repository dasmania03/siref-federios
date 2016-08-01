<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey ='id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'usuario',
        'nombre',
        'clave',
        'perfil_id'
    ];
}
