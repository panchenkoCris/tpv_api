<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id_ticket';
    public $timestamps = false;
    protected $fillable = [
        'fecha', 'registrado', 'id_usuario'
    ];    
}
