<?php

namespace App\Interfaces;

interface IPersistencia
{
    public function cadastrar(array $array):object;
    public function atualizar(array $array, int $id):bool;
    public function consultarPorId(int $id):object;
    public function deletar(int $id):int;
    public function listar():object;
}
