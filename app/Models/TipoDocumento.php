<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $table   = 'tipo_documento';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'descripcion',
    ];

     public function tipoDocumento(){
    
        return $this->hasOne(TipoDocumento::class, 'id' ,'tipo_documento_id');
    } 
}
