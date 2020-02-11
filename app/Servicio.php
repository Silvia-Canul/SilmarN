<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table='servicios';
    protected $primaryKey='id_servicio';

    public $timestamps = false;

    public $fillable=[
    	'servicio',
    	'fecha_ser',
    	'hora_serv',
    	'costo'
    ];
}
