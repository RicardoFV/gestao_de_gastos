<?php

namespace App\Service;

use App\Interfaces\IPersistencia;
use App\Models\PermissaoRota;
use App\Models\Rota;

class Persistencia implements IPersistencia
{
    private $classe;

    public function __construct($classe)
    {
        $this->classe = $classe;
    }
    // cadastra um objeto
    public function cadastrar(array $array): object
    {
        return $this->classe::create($array);
    }
    // atualiza um objeto
    public function atualizar(array $array, int $id): bool
    {
        return $this->classe::findOrFail($id)->update($array);
    }
    // realiza o retorno de um objeto
    public function consultarPorId(int $id): object
    {
        return $this->classe::findOrFail($id);
    }
    // deleta um objeto de forma logica
    public function deletar(int $id): int
    {
        return $this->classe::findOrFail($id)->delete();
    }
    // realiza a listagem
    public function listar(): object
    {
        return $this->classe::all();
    }
    // realiza a busca pelo o nome da rota e retorna o id da mesma
    public function buscarRotaPorNome(string $rota): int
    {
        $rotaId = 0;
        // pega a quantidade de rota, atraves do nome passado
        $quantidade = Rota::where('caminho', 'like', $rota)->count();

        // caso a quantidade seja maior que zero
        if ($quantidade > 0) {
            $rotaId = Rota::select('id')->where('caminho', 'like', $rota)->get();
            return $rotaId[0]['id'];
        }

        return $rotaId;
    }
    /*
        verifica se o perfil do usuario esta na tabela PermissaoRota
        caso esteja, significa que o perfil não pode acessar determinada rota.
    */
    public function consutarPermissao(int $rotaId, int $perfilId)
    {

        return  PermissaoRota::where([
            'perfil_id' => $perfilId,
            'rota_id' => $rotaId
        ])->count();

    }
}
