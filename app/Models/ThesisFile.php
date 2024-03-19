<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisFile extends Model
{
    protected $table   = 'thesis_files';
    public $timestamps = true;

    protected $fillable = [
        'thesis_id',
        'url',
        'name',
        'url_cedula',
        'name_cedula',
        'state'
    ];
}
