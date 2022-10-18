<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposUsuario extends Model
{
    //NOMBRE DE TABLA ESPECIFICO POR SER EN ESPAÑOL
    protected $table = "tipos_usuario";
    protected $primaryKey = 'tipousu_id';
    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
