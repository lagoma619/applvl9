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
        'nombre',
        'direccion',
        'telefono_contacto',
        'nombre_contacto',
        'origen_destino_recurrente',
        'id_estado',
        'id_cliente',
        'notas',
    ];

    public function cliente():BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function areas()
    {
        return $this->hasMany(CliArea::class);
    }
}
