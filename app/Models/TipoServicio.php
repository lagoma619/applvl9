<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tipos_servicio';
    protected $primaryKey = 'tiposervicio_id';
    protected $fillable = [
        'tiposervicio_nombre',
        'tiposervicio_descripción'
    ];
}
