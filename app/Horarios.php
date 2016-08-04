<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = 'horarios';
    protected $primaryKey ='id_horario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'disciplina_id'
    ];

    // Un horario puede estar en varias fichas
    public function fichas(){
        return $this->hasMany('App\Ficha', 'id_horario', 'horario_id');
    }
    
    //  functions   //
    public static function horarios($id){
        return Horarios::where('disciplina_id','=', $id)->get();
    }
}