<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IController
{
    public function cadastrar(Request $request):object;
    public function atualizar(Request $request, int $id) :object;
    public function consultar(Request $request,int $id):object;
    public function deletar(Request $request, int $id):object;
    public function listar(Request $request):object;
}
