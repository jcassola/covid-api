<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Persona
{
    protected $table = 'directores';
    protected $primaryKey = 'id_director';

    public function dirige()
    {
        return $this->belongsTo('App\Center', 'id_centro');
    }

    public function persona(){
        return $this->morphOne('App\Persona', 'personable', $type = 'tipo_persona', $id = 'id_persona');
    }
}
