<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class themes extends Model
{
    protected $table = 'themes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'id',
        'titulo',
        'descripcion',
        'fecha',
        'asesor',
        'created_at',
        'updated_at'
    ];
}
