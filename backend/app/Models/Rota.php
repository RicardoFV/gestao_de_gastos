<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rota extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'caminho',  'acao'
    ];

    // uma rota pode estar varias permissoes
    public function permissoes()
    {
        return $this->hasMany(PermissaoRota::class, 'rota_id');
    }
}
