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
        'mensualidad'
    ];
    
    // Una ficha puede tener una mensualidad
    public function ficha(){
        return $this->hasOne('App\Ficha', 'id_ficha', 'ficha_id');
    }
    // una mensualidad puede tener un producto
    public function producto(){
        return $this->belongsTo('App\Productos');
    }
}