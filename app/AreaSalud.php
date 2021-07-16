<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaSalud extends Model
{
    protected $table = 'area_salud';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'separador',
        'id_provincia',
        'id_municipio'
    ];

    public function provincia()
    {
        return $this->hasOne('App\Provincia', 'id_provincia');
    }

    public function municipio()
    {
        return $this->hasOne('App\Municipio', 'id_municipio');
    }
}
