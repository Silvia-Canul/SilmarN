<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'nick';
    public $with =['rol'];
    public $incrementing = false;
    public $timestamps = false;

    public $fillable=[
    'nick',
    'password',
    'nombre',
    'apellido_p',
    'apellido_m',
    'celular',
    'correo',
    'municipio',
    'calle',
    'numero',
    'cruzamiento',
    'fecha_nac',
    'foto',
    'id_rol'

    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }

}
