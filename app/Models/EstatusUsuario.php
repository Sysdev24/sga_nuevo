<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusUsuario extends Model
{
    protected $table   = 'estatus';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'descripcion',
    ];
}
