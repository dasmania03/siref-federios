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

    public function ficha(){
        return $this->belongsTo('App\Ficha');
    }

    public function producto(){
        return $this->belongsTo('App\Productos');
    }
}
