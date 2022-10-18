<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'tipos_vehiculo';
    protected $primaryKey = 'tipovehiculo_id';
    protected $fillable = [
        'tipovehiculo_nombre',
        'tipovehiculo_descripcion'
    ];
}
