<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'ficha';
    protected $primaryKey ='id_ficha';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'estado',
        'deportista_id',
        'representante_id',
        'disciplina_id',
        'horario_id'
    ];

    public function deportista(){
        return $this->belongsTo('App\Deportista');
    }
    public function representante(){
        return $this->belongsTo('App\Representante');
    }
    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }
    public function horario(){
        return $this->belongsTo('App\Horarios');
    }

    public function scopeBuscar($query, $idficha){
        if(trim($idficha) != ""){
            $query->where("id_ficha", $idficha);
        }
    }
}
