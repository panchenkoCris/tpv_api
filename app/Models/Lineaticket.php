<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lineaticket extends Model
{
    protected $table = 'lineaticket';
    protected $primaryKey = 'id_lineaticket';
    public $timestamps = false;

    protected $fillable = [
        'cb_producto', 'id_ticket'
    ];
}
