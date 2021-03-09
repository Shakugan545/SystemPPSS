<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    protected $table = 'estudiantes';
    public $timestamps = false;
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'codigo',
        'nombre',
        'telefono',
        'correo',
        'carrera',
        'foto',
    ];

}
