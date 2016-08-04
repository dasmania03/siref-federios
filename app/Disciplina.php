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
    
    // Una disciplina puede estar en varias fichas
    public function fichas(){
        return $this->hasMany('App\Ficha', 'id_disciplina', 'disciplina_id');
    }

    // una disciplina puede estar en varios productos
    public function productos(){
        return $this->hasMany('App\Productos', 'id_disciplina', 'disciplina_id');
    }
}
