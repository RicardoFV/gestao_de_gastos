<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;
    use SoftDeletes;

    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'usuario_id_cadastro', 'perfil_id', 'password'
    ];
    // um usuario so pode ter um perfil
    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
    // um usuário possui varios lançamaentos na carteira
    public function carteira()
    {
        return $this->hasMany(Carteira::class, 'usuario_id');
    }


    // coloca a primeira letra de cada palavra em maiusculo
    public function setNomeAttribute(string $name)
    {
        $this->attributes['name'] = ucfirst($name);
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
