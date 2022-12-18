<?php

namespace App\Http\Controllers\Api\Admin\Carteira;

use App\Http\Controllers\Api\Admin\BaseController;
use App\Models\Carteira;
use App\Service\Persistencia;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;

class CarteiraController extends BaseController
{
    public function __construct()
    {
        $this->validacaoCampos = $this->validarCampos();
        $this->persistencia = new Persistencia(Carteira::class);
    }

    public function cadastrarCarteira(Request $request)
    {
        try {
            // valida os campos
            $this->validate($request, $this->validacaoCampos);
            $resposta = [];
            // faz um for para realizar o cadastro
            for ($i = 0; $i < $request->input('quantidade'); $i++) {
                // monta as informações
                $dados = [
                    'nome' => $request->input('nome'),
                    'descricao' => $request->input('descricao'),
                    'repeti' => $request->input('repeti'),
                    'valor' => $request->input('valor'),
                    'quantidade' => $i + 1, // recebe a quantidade somando + 1 para que no banco fique certo
                    'vencimento' => $this->montarData($i, $request->input('vencimento')),
                    'tipo_id' => $request->input('tipo_id'),
                    'subtipo_id' => $request->input('subtipo_id'),
                    'usuario_id' => auth()->user()->id
                ];
                // realiza a inserção
                $resposta = $this->persistencia->cadastrar($dados);
            }
            // retorna a informação
            if ($resposta) {
                // retorna a resposta
                return response()
                    ->json([
                        'resposta' => $resposta,
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

    // moonta a data com base na quantidade de meses passado
    private function montarData(int $quantidade, $data)
    {
        return date(
            'Y-m-d H:i:s',
            strtotime(
                '+' . $quantidade . 'month',
                strtotime($data)
            )
        );
    }
    // retorna os dados contido na carteira por usuario
    public function listarCarteiraPorUsuario(int $id): object
    {
        try {
            // consulta os dados da carteira por usuario
            $dados = Carteira::with('userCarteira', 'carteiraTipo', 'carteiraSubTipo')
                ->where('usuario_id', $id)->get();
                // realiza a contagem, verificando se não é maior que zero
            if (count($dados) > 0) {
                return response()
                    ->json([
                        'resposta' => $dados,
                        'mensagem' => 'Success',
                        'status' => Response::HTTP_OK
                    ]);
            }

            // retorna a resposta vazia
            return response()
                ->json([
                    'resposta' => 'Erro ao Encontrar Dados',
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

    public function validarCampos()
    {
        return [
            'nome' => 'required|max:255|min:3',
            'vencimento' => 'required',
            'valor' => 'required',
            'descricao' => 'required',
            'repeti' => 'required',
            'quantidade' => 'required',
            'tipo_id' => 'required',
            'subtipo_id' => 'required',
        ];
    }
}
