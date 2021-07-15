<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosArribo extends Model
{
    protected $table = 'datos_arribos';
    protected $primaryKey = 'id_arribo';


    public function paciente()
    {
        return $this->belongsTo('App\DatosPaciente', 'id_paciente');
    }
}
