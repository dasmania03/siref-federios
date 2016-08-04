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
    
    //  Una ficha puede tener un deportista
    public function deportista(){
        return $this->belongsTo('App\Deportista');
    }
    // Una ficha puede tener un representante
    public function representante(){
        return $this->belongsTo('App\Representante');
    }
    // Una ficha puede tener una disciplina
    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }
    // Una ficha puede tener un horario
    public function horario(){
        return $this->belongsTo('App\Horarios');
    }
    
    // Una ficha puede tener solo una mensualidad
    public function mensualidad(){
        return $this->belongsTo('App\Mensualidad');
    }
    
    //  scopes functiosns //
    public function scopeBuscar($query, $idficha){
        if(trim($idficha) != ""){
            $query->where("id_ficha", $idficha);
        }
    }
}
