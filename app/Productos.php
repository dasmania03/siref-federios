<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey ='id_producto';
    public $timestamps = false;

    protected $fillable = [
        'disciplina_id',
        'edad_min',
        'edad_max',
        'detalle',
        'precio'
    ];

    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }

    public function mensualidades(){
        return $this->hasMany('App\Mensualidad');
    }
}
