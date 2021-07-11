<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteIngresado extends Model
{
    protected $table = 'pacientes_ingresados';
    protected $primaryKey = 'id_ingresado';

    protected $fillable = [
        'fecha_ingreso',
        'fecha_alta'
    ];

    public function datos()
    {
        return $this->hasOne('App\DatosPaciente', 'id_ingreso');
    }

    public function habitacion()
    {
        return $this->belongsTo('App\Centro', 'id_habitacion');
    }
}
