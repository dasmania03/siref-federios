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

    public function fichas(){
        return $this->hasMany('App\Ficha', 'horario_id', 'id_horario');
    }

    public static function horarios($id){
        return Horarios::where('disciplina_id','=', $id)->get();
    }
}