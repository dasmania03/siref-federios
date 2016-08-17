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

    // Un producto puede tener una disciplina
    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }

    // Un producto puede estar en varias mensualidades
    public function mensualidades(){
        return $this->hasMany('App\Mensualidad', 'id_producto', 'producto_id');
    }

    //scope functions
    public function scopeBuscar($query, $name){
        if(trim($name) != ""){
            $query->where("id_producto", $name);
        }
    }
}
