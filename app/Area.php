<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id_area';

    public function getHabitaciones()
    {
        return $this->hasMany('App\Habitacion', 'id_habitacion');
    }

    public function belongsToCentro()
    {
        return $this->belongsTo('App\Centro', 'id_centro');
    }
}
