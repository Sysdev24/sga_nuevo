<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    use HasFactory;
    protected $table   = 'objecion';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'descripcion',
    ];

    public function getCompletoNombreObservacionAttribute()
    {
        return $this->attributes['codigo'] .'-'. $this->attributes['nombre'];
    }
}
