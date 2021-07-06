<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';

    public function getPacientes()
    {
        return $this->hasMany('App\Paciente', 'id_habitacion');
    }

    public function belongsToArea()
    {
        return $this->belongsTo('App\Area', 'id_area');
    }

}
