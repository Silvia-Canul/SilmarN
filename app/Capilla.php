<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capilla extends Model
{
    //
    protected $table = 'capillas';
    protected $primaryKey= 'id_capilla';

    //es false    no se pone cuando mandas una fecha
    // public $incrementing = false; si es un varchar es false
    // public $timestamps = false;

    public $fillable=[
        'capilla',
        'descripcion',
        'municipio',
        'calle',
        'numero',
        'cruzamiento'
    ];
}
