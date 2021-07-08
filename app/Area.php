<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id_area';

    protected $fillable = [
        'nombre',
        'categoria'
    ];

    public function habitaciones()
    {
        return $this->hasMany('App\Habitacion', 'id_habitacion');
    }

    public function centro()
    {
        return $this->belongsTo('App\Centro', 'id_centro');
    }
}
