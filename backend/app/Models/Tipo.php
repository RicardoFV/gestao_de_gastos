<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'atividade'];

    // coloca a primeira letra de cada palavra em maiusculo
    public function setNomeAttribute(string $nome)
    {
        $this->attributes['nome'] = ucfirst($nome);
    }

    // um tipo pode ter muito subtipos
    public function subTipos()
    {
        return $this->hasMany(SubTipo::class, 'tipo_id');
    }

    // um tipo pode ter muitas carteiras
    public function tipoCarteiras()
    {
        return $this->hasMany(Carteira::class, 'tipo_id');
    }
}
