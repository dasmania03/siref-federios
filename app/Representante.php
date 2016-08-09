<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $table = 'representante';
    protected $primaryKey ='id_representante';
    public $timestamps = false;

    protected $fillable = [
        'identificacion',
        'apellido',
        'nombre',
        'direccion',
        'telefono',
        'email'
    ];

    //  Un representante puede estar en varias fichas
    public function fichas(){
        return $this->hasMany('App\Ficha', 'id_representante', 'representante_id');
    }

    //Un representante puede tener varios deportistas
    public function deportistas(){
        return $this->hasMany('App\Deportista', 'id_representante', 'representante_id');
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