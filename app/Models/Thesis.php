<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $table   = 'theses';
    public $timestamps = true;

    protected $fillable = [
        'thesis_code',
        'title',
        'state',
        'tramite_id',
    ];
}
