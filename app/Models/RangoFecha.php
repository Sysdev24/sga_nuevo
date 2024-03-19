<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RangoFecha extends Model
{
    use HasFactory;

    protected $table = 'rango_fechas';

    public function scopeTiposdocumentos($query, $tipos_documentos) {
    	if ($tipos_documentos) {
    		return $query->where('tipo_documento','like',"%".Str::upper($tipos_documentos)."%");
    	}
    }

    public function scopeGerencias($query, $gerencias) {
    	if ($gerencias) {
    		return $query->where('dirge_carga','like',"%".Str::upper($gerencias)."%")
            ->orWhere('dirge_receptor','like',"%".Str::upper($gerencias)."%");
        }
    }
}
