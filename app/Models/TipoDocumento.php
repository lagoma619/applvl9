<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';
    protected $primaryKey = 'tipodocumento_id';
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    use HasFactory;
}
