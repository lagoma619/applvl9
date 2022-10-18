<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioEstado extends Model
{
    protected $table = 'usuario_estados';
    protected $primaryKey = 'usuestado_id';
    use HasFactory;
}
