<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CargaDocumento extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table   = 'carga_documentos';
    public $timestamps = true;

    protected $fillable = [
        'nro_documento',
        'fecha_documento',
        'usuario_emisor_id',
        'gergral_emisor_id',
        'area_emisor_id',
        'tipo_documento_id',
        'observaciones',
        'estatus_docu_id',
        'usuario_receptor_id',
        'gergral_receptor_id',
        'area_receptor_id',
        'asunto'
    ];

    public function gerenciasEmisor(){

        return $this->hasOne(GerenciaGeneral::class, 'id', 'gergral_emisor_id');
    }
    public function gerenciasReceptor(){

        return $this->hasOne(GerenciaGeneral::class, 'id', 'gergral_receptor_id');
    }

    public function areaEmisor(){

        return $this->hasOne(AreaTrabajo::class, 'id', 'area_emisor_id');
    }

    public function areaReceptor(){

        return $this->hasOne(AreaTrabajo::class, 'id','area_receptor_id');
    }

    public function status(){

        return $this->hasOne(EstatusDocumentos::class, 'id', 'status_doc_id');
    }

    public function emisor(){

        return $this->hasOne(User::class, 'id', 'usuario_receptor_id');
    }


    public function receptor(){

        return $this->hasOne(User::class, 'id', 'usuario_emisor_id');
    }
    public function tipoDocumento(){

        return $this->hasOne(TipoDocumento::class, 'id', 'tipo_documento_id');
    }

    public function tipoObjecion(){

        return $this->hasOne(Observaciones::class, 'id', 'objecion');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


}
