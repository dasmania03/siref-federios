<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplinas';
    protected $primaryKey ='id_disciplina';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    public function fichas(){
        return $this->hasMany('App\Ficha', 'disciplina_id', 'id_disciplina');
    }

    public function productos(){
        return $this->hasMany('App\Productos', 'disciplina_id', 'id_disciplina');
    }
}
