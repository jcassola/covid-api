<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteSintomas extends Model
{
    protected $table = 'paciente_sintomas';
    protected $primaryKey = 'id_sintomas';

    protected $fillable = [
        'fecha_sintomas',
        'fiebre',
        'rinorrea',
        'congestion_nasal',
        'tos',
        'expectoracion',
        'dificultad_respiratoria',
        'cefalea',
        'dolor_garganta',
        'otros'
    ];


    public function paciente()
    {
        return $this->belongsTo('App\DatosPaciente', 'id_paciente');
    }
}
