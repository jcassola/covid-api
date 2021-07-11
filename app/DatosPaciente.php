<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPaciente extends Model
{
    protected $table = 'datos_paciente';
    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'test_antigeno',
        'vacunado',
        'nombre',
        'edad',
        'ci',
        'sexo',
        'direccion',
        'municipio',
        'provincia',
        'cmf',
        'remite_caso',
        'hospital',
        'estado_salud',
        'estado_sistema',
        'trabajador_salud',
    ];

    public function apps()
    {
        return $this->hasOne('App\PacienteApp', 'id_paciente');
    }

    public function contactos()
    {
        return $this->hasOne('App\PacienteContacto', 'id_paciente');
    }

    public function sintomas()
    {
        return $this->hasOne('App\PacienteSintomas', 'id_paciente');
    }

    public function ingreso()
    {
        return $this->belongsTo('App\PacienteIngresado', 'id_ingreso');
    }
}
