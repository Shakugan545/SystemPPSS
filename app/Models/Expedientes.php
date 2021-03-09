<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedientes extends Model
{
    protected $table = 'expedientes';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'programa',
        'inicio',
        'fin',
        'dia',
        'h_inicio',
        'h_fin',
        'reportes',
        'estudiantes_codigo'
    ];
}
