<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';

    public function habitacion()
    {
        return $this->belongsTo('App\Habitacion', 'id_habitacion');
    }

    public function persona(){
        return $this->morphOne('Persona', 'personable', $type = 'tipo_persona', $id = 'id_persona');
    }


}
