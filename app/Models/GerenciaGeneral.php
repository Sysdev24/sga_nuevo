<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GerenciaGeneral extends Model
{
    use HasFactory;
    protected $table   = 'gergral';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'descripcion',
    ];
    public function gerenciasEmisor(){

        return $this->hasOne(GerenciaGeneral::class, 'id', 'gergral_emisor_id');
    }
    public function gerenciasReceptor(){

        return $this->hasOne(GerenciaGeneral::class, 'id', 'gergral_receptor_id');
    }
    /*public function documento(){

        return $this->hasMany(Documento::class);
    }*/
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