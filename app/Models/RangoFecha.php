<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RangoFecha extends Model
{
    use HasFactory;

    protected $table = 'listado_documentos';

    public function scopeTiposdocumentos($query, $tipo_documento) {
    	if ($tipo_documento) {
    		return $query->where('tipo_documento_id','like', $tipo_documento);
    	}
    }

    public function scopeGerencias($query, $gerencias) {
    	if ($gerencias) {
    		return $query->where('gergral_emisor_id','like', $gerencias)
            ->orWhere('gergral_receptor_id','like',$gerencias);
        }
    }
}
