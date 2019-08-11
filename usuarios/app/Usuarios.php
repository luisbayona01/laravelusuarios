<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {

    public $timestamps = false;
    protected $table = 'usuarios';  // tabla usuarios
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'correo', 'telefono'
    ];

}
