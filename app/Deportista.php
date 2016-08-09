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

    // Un deportista puede tener un representante
    public function representante(){
        return $this->belongsTo('App\Representante');
    }
    
    // Un deportista puede estar en varias fichas //
    public function ficha(){
        return $this->hasMany('App\Ficha', 'id_deportista','deportista_id');
    }

    //  scope functions //
    public function scopeBuscar($query, $name, $typesearch){
        if(trim($name) != ""){
            if ($typesearch != "" && $typesearch == 'cedula'){
                $query->where("identificacion", $name);
            } elseif ($typesearch != "" && $typesearch == 'flname') {
                $query->where("apellido", "LIKE", strtoupper("%$name%"));
            }
        }
    }
}
