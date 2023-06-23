<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposUsuario extends Model
{
    use HasFactory;

    protected $table = 'tiposusuario';

    protected $fillable = [
        'id',
        'descricao'
    ];

    public function usuarios() {
        return $this->hasMany(Usuario::class, 'tipoUsuario');
    }
}