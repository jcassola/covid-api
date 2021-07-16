<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincia';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'codigo'
    ];
}
