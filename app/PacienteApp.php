<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteApp extends Model
{
    protected $table = 'paciente_apps';
    protected $primaryKey = 'id_app';

    protected $fillable = [
        'hipertension',
        'diabetes',
        'asma',
        'obesidad',
        'insuficiencia_renal',
        'emabarazo',
        'ninho',
        'oncologia',
        'otros_apps'
    ];


    public function paciente()
    {
        return $this->belongsTo('App\DatosPaciente', 'id_paciente');
    }
}
