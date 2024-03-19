<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaTrabajo extends Model
{
    use HasFactory;
    protected $table   = 'area_trabajo';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'gergral_id',
        'id',
        'descripcion',
    ];

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
