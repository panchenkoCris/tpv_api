<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'cb_producto';
    public $timestamps = false;
    protected $fillable = [
        'cb_producto', 'existencias', 'precio', 'talla',
        'color', 'descripcion', 'imagen','id_tipo', 'id_categoria'
    ];

}
