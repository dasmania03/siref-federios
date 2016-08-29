<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    protected $table = 'mensualidad';
    protected $primaryKey ='id_mensualidad';
    public $timestamps = false;

    protected $fillable = [
        'ficha_id',
        'producto_id',
        'mes_inicio',
        'mes_fin',
        'mensualidades'
    ];
    
    // Una ficha puede tener una mensualidad
    public function ficha(){
        return $this->hasOne('App\Ficha', 'id_ficha', 'ficha_id');
    }
    // una mensualidad puede tener un producto
    public function producto(){
        return $this->belongsTo('App\Productos');
    }
    
    public function scopeBuscar($query, $name, $typesearch){
        if(trim($name) != ""){
            if ($typesearch != "" && $typesearch == 'ficha'){
                $query->where("ficha_id", $name);
            } elseif ($typesearch != "" && $typesearch == 'disciplina') {
                $query->whereHas('ficha.disciplina', function ($query) use ($name) {
                    $query->where('nombre', 'LIKE', strtoupper("%$name%"));
                });
            } elseif ($typesearch != "" && $typesearch == 'deportista'){
                $query->whereHas('ficha.deportista', function ($query) use ($name) {
                    $query->where('identificacion', $name)
                            ->orWhere('apellido', 'LIKE', strtoupper("%$name%"));
                });
            } elseif ($typesearch != "" && $typesearch == 'representante'){
                $query->whereHas('ficha.representante', function ($query) use ($name) {
                    $query->where('identificacion', $name)
                        ->orWhere('apellido', 'LIKE', strtoupper("%$name%"));
                });
            }
        }
    }
}