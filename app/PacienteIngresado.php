<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteIngresado extends Model
{
    protected $table = 'pacientes_ingresados';
    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'fecha_ingreso',
        'fecha_alta',
        'estado_ingreso'
    ];

    public function habitacion()
    {
        return $this->belongsTo('App\Centro', 'id_habitacion');
    }
}
