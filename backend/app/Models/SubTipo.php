<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tipo;

class SubTipo extends Model
{
    use SoftDeletes;

    protected $table = 'subtipos';

    protected $fillable = ['nome', 'tipo_id'];

    // coloca a primeira letra de cada palavra em maiusculo
    public function setNomeAttribute(string $nome)
    {
        $this->attributes['nome'] = ucfirst($nome);
    }
    // subtipo so pode ter um tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class,'tipo_id');
    }

    // um subTipo pode estar em muitas carteiras
    public function subTipoCarteiras()
    {
        return $this->hasMany(Carteira::class, 'subtipo_id');
    }
}
