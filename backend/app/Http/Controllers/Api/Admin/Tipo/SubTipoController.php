<?php

namespace App\Http\Controllers\Api\Admin\Tipo;
use App\Http\Controllers\Api\Admin\BaseController;
use App\Models\SubTipo;
use App\Service\Persistencia;

class SubTipoController extends BaseController
{
    public function __construct()
    {
        $this->validacaoCampos = $this->validarCampos();
        $this->persistencia = new Persistencia(SubTipo::class);
    }

    public function validarCampos()
    {
        return [
            'nome' => 'required|max:255|min:3',
            'tipo_id' => 'required'
        ];
    }
}
