<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusDocumentos extends Model
{
    Use HasFactory;
    protected $table   = 'estatus';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'estatus',
        'status',
    ];
}
