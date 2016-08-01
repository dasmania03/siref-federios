<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey ='id_perfil';
    public $timestamps = false;

    protected $fillable = [
        'perfil'
    ];
}
