<?php

/*
    uma classe abstract responsavel por fazer a gestão do controller
    ela é responsavel por gerenciar o processo de CRUD através da herança
*/

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IController;
use App\Service\Persistencia;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use App\Http\Traits\CaminhoRota;

abstract class BaseController extends Controller implements IController
{
    use CaminhoRota;
    // responsavel por receber os campos que serão validados
    protected array $validacaoCampos;
    // cria um para pegar o atributo de persistencia que esta dentro de service
    protected Persistencia $persistencia;
    private int $rotaId;
    private int $contarPermissao = 0;

    public function cadastrar(Request $request): object
    {
        try {
            // em caso de permissão igual 0 pode ter acesso
            if ($this->retornarPermissao($request->route()[1]['uses']) == 0) {

                $this->validate($request, $this->validacaoCampos);

                $dados = $this->persistencia->cadastrar($request->all());
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
            }

            return response()->json([
                'resposta' => [],
                'mensagem' => 'Nao autorizado',
                'status' => Response::HTTP_FORBIDDEN
            ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function atualizar(Request $request, int $id): object
    {
        try {

            // em caso de permissão igual 0 pode ter acesso
            if ($this->retornarPermissao($request->route()[1]['uses']) == 0) {

                $this->validate($request, $this->validacaoCampos);

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
            }
            return response()->json([
                'resposta' => [],
                'mensagem' => 'Nao autorizado',
                'status' => Response::HTTP_FORBIDDEN
            ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deletar(Request $request, $id): object
    {
        try {

            // em caso de permissão igual 0 pode ter acesso
            if ($this->retornarPermissao($request->route()[1]['uses']) == 0) {
                // deleta de forma logica o cadastro
                $data = $this->persistencia->deletar($id);
                if ($data) {

                    return response()->json([
                        'resposta' => $data,
                        'mensagem' => 'Success',
                        'status' => Response::HTTP_OK
                    ]);
                }
                return response()->json([
                    'resposta' => [],
                    'mensagem' => 'Erro ao deletar',
                    'status' => Response::HTTP_NO_CONTENT
                ]);
            }
            return response()->json([
                'resposta' => [],
                'mensagem' => 'Nao autorizado',
                'status' => Response::HTTP_FORBIDDEN
            ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function consultar(Request $request, $id): object
    {
        try {

            // em caso de permissão igual 0 pode ter acesso
            if ($this->retornarPermissao($request->route()[1]['uses']) == 0) {
                // retorna a resposta
                return response()
                    ->json([
                        'resposta' => $this->persistencia->consultarPorId($id),
                        'mensagem' => 'Success',
                        'status' => Response::HTTP_OK
                    ]);
            }
            return response()->json([
                'resposta' => [],
                'mensagem' => 'Nao autorizado',
                'status' => Response::HTTP_FORBIDDEN
            ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function listar(Request $request): object
    {
        try {
            // em caso de permissão igual 0 pode ter acesso

            if ($this->retornarPermissao($request->route()[1]['uses']) == 0) {

                $dados = $this->persistencia->listar();

                if ($dados->count() > 0) {
                    return response()
                        ->json([
                            'resposta' => $dados,
                            'mensagem' => 'Success',
                            'status' => Response::HTTP_OK
                        ]);
                }

                return response()
                    ->json([
                        'resposta' => [],
                        'mensagem' => 'Success',
                        'status' => Response::HTTP_NO_CONTENT
                    ]);
            }
            return response()->json([
                'resposta' => [],
                'mensagem' => 'Nao autorizado',
                'status' => Response::HTTP_FORBIDDEN
            ]);
        } catch (QueryException $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

}
