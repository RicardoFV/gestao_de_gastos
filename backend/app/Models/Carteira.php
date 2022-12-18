<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Carteira extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'vencimento',
        'valor',
        'descricao',
        'repeti',
        'quantidade',
        'tipo_id',
        'subtipo_id',
        'usuario_id'
    ];

    // um usuario so pode ter uma carteira
    public function userCarteira()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }


    // uma carteira lançada so pode pertencer a um tipo
    public function carteiraTipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    // uma carteira lançada so pode pertencer a um subtipo
    public function carteiraSubTipo()
    {
        return $this->belongsTo(SubTipo::class, 'subtipo_id');
    }

    // coloca a primeira letra de cada palavra em maiusculo
    public function setNomeAttribute(string $nome)
    {
        $this->attributes['nome'] = ucfirst($nome);
    }
}
