<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipo';
    public $timestamps = false;
    protected $fillable=[
        'id', 'nombre_tipo', 'longitud_tipo'
    ];
}
