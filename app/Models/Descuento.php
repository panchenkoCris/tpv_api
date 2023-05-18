<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuento';
    public $timestamps = false;
    protected $fillable=[
        'id', 'descripcion', 'cantidad_descuento'
    ];
}
