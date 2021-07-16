<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'codigo',
        'id_provincia'
    ];

    public function provincia()
    {
        return $this->hasOne('App\Provincia', 'id_provincia');
    }
}
