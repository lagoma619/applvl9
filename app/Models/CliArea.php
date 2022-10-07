<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CliArea extends Model
{
    //use HasFactory;
    protected $table = 'cli_areas';
    protected $fillable = [
        'nombres',
        'ubicacion',
        'numero_telefono',
        'nombre_contacto',
        'origen_destino_recurrente',
        'estado',
        'id_sede',
    ];
    public function clisedes(){
        return $this->belongsTo(CliSede::class);
    }

}
