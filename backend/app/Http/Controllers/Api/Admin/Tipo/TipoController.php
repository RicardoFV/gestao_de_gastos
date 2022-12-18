<?php

namespace App\Http\Controllers\Api\Admin\Tipo;

use App\Http\Controllers\Api\Admin\BaseController;
use App\Models\Tipo;
use App\Service\Persistencia;

class TipoController extends BaseController
{

    public function __construct()
    {
        $this->validacaoCampos = $this->validarCampos();
        $this->persistencia = new Persistencia(Tipo::class);
    }

    public function validarCampos()
    {
        return [
            'nome' => 'required|max:255|min:3',
            'atividade' => 'required'
        ];
    }
}
