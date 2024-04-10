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

   /* public function status(){

        return $this->hasO    <td></td>
        <td>{{ mb_strtoupper($v->nro_documento) }}</td>
        <td>{{ date('d-m-Y', strtotime($v->fecha_documento)) ?? '' }}</td>
        <td>{{ ($v->tipo_documento) ?? '' }}</td>
        <td>{{ mb_strtoupper($v->cargado_por, 'utf-8')}}<br> <b>Gerencia: </b> {{ ($v->dirge_carga)}} <br> <b>Division:</b> {{ ($v->area_carga) ?? ''}} </td>
        <td>{{ mb_strtoupper($v->receptor, 'utf-8')}}<br> <b>Gerencia: </b>  {{($v->dirge_receptor)}} <br> <b>Division:</b> {{($v->area_receptor) ?? ''}}</td>
        <td>{{ mb_strtoupper($v->asunto) }}</td>
        <td>{{ mb_strtoupper($v->observaciones) }}</td>
        <td width='100'>ne(EstatusDocumentos::class, 'id', 'status_doc_id');
    }*/

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
