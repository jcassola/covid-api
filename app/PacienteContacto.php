<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteContacto extends Model
{
    protected $table = 'paciente_contactos';
    protected $primaryKey = 'id_contactos';

    protected $fillable = [
        'fecha_contacto',
        'tipo_contacto',
        'lugar_contacto'
    ];


    public function paciente()
    {
        return $this->belongsTo('App\DatosPaciente', 'id_paciente');
    }
}
