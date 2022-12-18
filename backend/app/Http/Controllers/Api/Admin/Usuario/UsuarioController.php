<?php

namespace App\Http\Controllers\Api\Admin\Usuario;

use App\Http\Controllers\Api\Admin\BaseController;
use App\Service\Persistencia;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsuarioController extends BaseController
{

    public function __construct()
    {
        $this->validacaoCampos = [];
        $this->persistencia = new Persistencia(User::class);
    }

    public function cadastrarUsuario(Request $request):object
    {
        try {
            // cria a validação
            $this->validate(
                $request,
                [
                    'name' => 'required|max:255|min:3',
                    'email' => ['required', Rule::unique('usuarios')->ignore($request->input('email')), 'max:255'],
                    'password' => 'required|max:16|min:6'
                ]
            );

            // cria o array com os dados
            $usuario = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'usuario_id_cadastro' => 1,
                'perfil_id' => 2
            ];
            // realiza o cadastro
            $dados = $this->persistencia->cadastrar($usuario);
            if ($dados) {

                // retorna a resposta
                return response()
                    ->json([
                        'resposta' => $dados,
                        'mensagem' => 'Success',
                        'status' => Response::HTTP_CREATED
                    ]);
            }

            // retorna a resposta vazia
            return response()
                ->json([
                    'resposta' => 'Erro ao cadastrar',
                    'mensagem' => 'Success',
                    'status' => Response::HTTP_NO_CONTENT
                ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function atualizarUsuario(Request $request, int $id):object
    {
        try {
            // valida os dados
            $this->validate(
                $request,
                [
                    'name' => 'required|max:255|min:3',
                    'email' => ['required', Rule::unique('usuarios')->ignore($id), 'max:255']
                ]

            );
            // realiza a auteração
            $dados = $this->persistencia->atualizar($request->all(), $id);
            // em caso de sucesso na atualização
            if ($dados) {

                // retorna a resposta
                return response()
                    ->json([
                        'resposta' => $this->persistencia->consultarPorId($id),
                        'mensagem' => 'Success',
                        'status' => Response::HTTP_OK
                    ]);
            }

            // retorna a resposta
            return response()
                ->json([
                    'resposta' => 'Erro ao Atualizar',
                    'mensagem' => 'Success',
                    'status' => Response::HTTP_NO_CONTENT
                ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
