<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CliArea extends Model
{
    //use HasFactory;
    protected $table = 'cli_areas';
    protected $primaryKey = 'area_id';
    protected $fillable = [
        'area_nombre',
        'area_id_cliente',
        'area_telefono_contacto',
        'area_nombre_contacto',
        'area_origen_destino_recurrente',
        'area_estado',
        'area_id_sede',
    ];
    public function clisedes(){
        return $this->belongsTo(CliSede::class);
    }

}
