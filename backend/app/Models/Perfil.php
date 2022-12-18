<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{

    use SoftDeletes;

    protected $table = 'perfils';

    protected $fillable =['nome'];

    // um perfil pode ter multiplos usuarios
    public function users()
    {
        return $this->hasMany(User::class, 'perfil_id');
    }

    // um perfil pode ter multiplas permissoes
    public function permissoes()
    {
        return $this->hasMany(PermissaoRota::class, 'perfil_id');
    }

    // coloca a primeira letra de cada palavra em maiusculo
    public function setNomeAttribute(string $nome)
    {
        $this->attributes['nome'] = ucfirst($nome);
    }
}
