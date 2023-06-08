<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';

    protected $primaryKey = 'id_cuenta';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario','id_descuento', 'descuento_activado'
    ];
}
