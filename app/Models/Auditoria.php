<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $table   = 'audits';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_type',
        'user_id',
        'event',
        'auditable_type',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'created_at',
        'updated_at',
    ];

    public function auditorias(){

        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
