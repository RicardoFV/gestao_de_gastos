<?php

namespace App\Http\Traits;

trait CaminhoRota
{

    // capitura o caminho da rota que esta em uso
    // retorna 0 significa que pode acessar, 1 significa que não pode acessar
    private function retornarPermissao(string $rota): int
    {
        // pega o id da rota cadastrada. (Em caso de não cadastrada sera retornado zero)
        $this->rotaId = $this->persistencia->buscarRotaPorNome($rota);
        // caso o id da rota seja maior que zero
        if ($this->rotaId > 0) {
            // verifica se a rota esta entre as não permitida para o usuario que esta acessando
            $this->contarPermissao = $this->persistencia->consutarPermissao($this->rotaId, auth()->user()->perfil_id);
            // retorna a contagem
            return $this->contarPermissao;
        }
        // retorna a contagem
        return $this->contarPermissao;
    }
}
