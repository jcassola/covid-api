<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_centro';
    protected $fillable = [
        'nombre_centro',
        'municipio',
        'organismo'
    ];

    public function areas()
    {
        return $this->hasMany('App\Area', 'id_centro');
    }

    public function director()
    {
        return $this->hasOne('App\Director', 'id_centro');
    }
}
