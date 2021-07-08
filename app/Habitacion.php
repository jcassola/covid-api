<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';

    public function pacientes()
    {
        return $this->hasMany('App\PacienteIngresado', 'id_habitacion');
    }

    public function area()
    {
        return $this->belongsTo('App\Area', 'id_area');
    }

}
