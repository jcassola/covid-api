<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';

    // Adicionar personable_id y personable_type como atributos a Persona si no funciona los parametros modificados
    public function personable(){
        return $this->morphTo($type = 'tipo_persona', $id = 'id_persona');
    }
}
