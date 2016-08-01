<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';
    protected $primaryKey ='id_venta';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'concepto',
        'detalle',
        'precio',
        'ficha_id',
        'user_id'
    ];

//    public function ficha(){
//        return $this->hasMany('App\Deportista', 'representante_id', 'id_representante');
//    }

    public function scopeBuscar($query, $name){
        if(trim($name) != ""){
            $query->where("id_venta", $name);
        }
    }
}