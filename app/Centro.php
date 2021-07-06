<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_centro';

    public function getAreas()
    {
        return $this->hasMany('App\Area', 'id_centro');
    }

    public function getDirector()
    {
        return $this->hasOne('App\Director', 'id_centro');
    }
}
