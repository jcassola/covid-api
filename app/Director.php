<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directores';
    protected $primaryKey = 'id_director';

    public function dirige()
    {
        return $this->belongsTo('App\Centro', 'id_centro');
    }

    // public function persona(){
    //     return $this->morphOne('App\Persona', 'personable', $type = 'tipo_persona', $id = 'id_persona');
    // }
}
