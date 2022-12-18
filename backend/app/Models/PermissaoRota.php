<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Perfil;
use Rota;

class PermissaoRota extends Model
{
    protected $table = 'permissao_rota';
    protected $fillable = [
        'perfil_id', 'rota_id'
    ];
    // uma permissão so tem um perfil
    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    // uma permissão so tem uma rota
    public function rota()
    {
        return $this->belongsTo(Rota::class, 'rota_id');
    }
}
