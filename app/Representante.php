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

    public function deportistas(){
        return $this->hasMany('App\Deportista', 'representante_id', 'id_representante');
    }

    public function fichas(){
        return $this->hasMany('App\Ficha', 'representante_id', 'id_representante');
    }

    public function scopeBuscar($query, $name){
        if(trim($name) != ""){
            $query->where("identificacion", $name)
                ->orWhere("apellido", "LIKE", "%$name%");
        }
    }
}