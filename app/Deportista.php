<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    protected $table = 'deportista';
    protected $primaryKey ='id_deportista';
    public $timestamps = false;

    protected $fillable = [
        'identificacion',
        'talla',
        'genero',
        'apellido',
        'nombre',
        'fecha_nac',
        'direccion',
        'telefono',
        'email',
        'discapacidad',
        'num_carnet',
        'tipo_discapacidad',
        'grado_discapacidad',
        'representante_id'
    ];

    public function representante(){
        return $this->belongsTo('App\Representante');
    }

    public function fichas(){
        return $this->hasMany('App\Ficha', 'deportista_id', 'id_deportista');
    }

    public function scopeBuscar($query, $name){
        if(trim($name) != ""){
            $query->where("identificacion", $name)
                ->orWhere('apellido', 'LIKE', "%$name%");
        }
    }
}
