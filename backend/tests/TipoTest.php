<?php
/*
    Realiza alguns testes referente ao CRUD da Classe Tipo
*/

class TipoTest extends TestCase
{
    private $resposta;
    // cadastrar um tipo com o usuario com perfil (Usuario)
    public function testCadastrarUmTipoComPerfilUsuario()
    {
        // realiza a autenticação
        $this->resposta = $this->post('api/auth/login', $this->dadosUsuarioPerfilTipoUsuario());
        // retorna o status da autenticação
        $this->resposta->assertResponseOk();
        // realiza a inserção
        $this->resposta->post('api/tipo/cadastrar', $this->dadosCadastrarTipo());
        // retorna o status 401 (por conta de não estar autorizado!)
        $this->resposta->assertResponseStatus(401);
    }

    // cadastrar um tipo com o usuario com perfil (Super)
    public function testCadastrarUmTipoComPerfiSuper()
    {
        // realiza a autenticação
        $this->resposta = $this->post('api/auth/login', $this->dadosUsuarioPerfilSuper());
        // retorna o status da autenticação
        $this->resposta->assertResponseOk();
        // realiza a inserção
        $this->resposta->post('api/tipo/cadastrar', $this->dadosCadastrarTipo());
        // retorna o status 401 (por conta de não estar autorizado!)
        $this->resposta->assertResponseStatus(200);
    }

    public function testAlterarTipoComUsuarioPerfilUsuario()
    {
        // realiza a autenticação
        $this->resposta = $this->post('api/auth/login', $this->dadosUsuarioPerfilTipoUsuario());
        // retorna o status da autenticação
        $this->resposta->assertResponseOk();

    }

    private function dadosCadastrarTipo()
    {
        return [
            'nome' => 'Tipo Teste',
            'atividade' => 'RECEITA'
        ];
    }

     // dados para acesso com usuario com o perfil (usuário)
     private function dadosUsuarioPerfilTipoUsuario()
     {
         return [
             'email' => 'usuario1@gmail.com',
             'password' => '123456'
         ];
     }
     // dados para acesso com usuario com o perfil (Super)
     private function dadosUsuarioPerfilSuper()
     {
         return [
             'email' => 'superadmin@gmail.com',
             'password' => '12345678'
         ];
     }
}
