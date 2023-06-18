<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;

    public function usuario()
    {
        $this->belongsTo(Usuario::class, 'id');
    }

    public function tramites()
    {
        return $this->hasMany(Tramite::class, 'id');
    }
}