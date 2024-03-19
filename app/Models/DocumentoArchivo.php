<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoArchivo extends Model
{
    protected $table   = 'pub';
    public $timestamps = true;

    protected $fillable = [
        'tramite_id',
        'pub_ruta'
    ];
}
