<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CliSede extends Model
{
    //use HasFactory;
    protected $table = 'cli_sedes';
    protected $fillable = [
        'sede_nombre',
        'sede_direccion',
        'sede_telefono_contacto',
        'sede_nombre_contacto',
        'sede_origen_destino_recurrente',
        'sede_id_estado',
        'sede_id_cliente',
        'sede_notas',
    ];

    public function cliente():BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function areas()
    {
        return $this->hasMany(CliArea::class);
    }
}
