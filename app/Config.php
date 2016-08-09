<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';
    protected $primaryKey ='id_config';
    public $timestamps = false;

    protected $fillable = [
        'name_config',
        'config'
    ];
}
