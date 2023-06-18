<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;

    public function chamado()
    {
        $this->belongsTo(Chamado::class, 'id');
    }

    public function tramite()
    {
        return $this->BelongsTo(Usuario::class, 'id');
    }
}
