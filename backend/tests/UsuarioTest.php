<?php
/*
    Realiza alguns testes referente ao CRUD da Classe de Usuário
*/
class UsuarioTest extends TestCase
{
    private $resposta;

    // realiza o teste da tentativa de listar o usuario semestar logado
    public function testlistarUsuarioSemEstarLogado()
    {
        // realiza a listagem de usuarios
        $this->listarUsuarios();
        // retorno do status
        $this->resposta->assertResponseStatus(401);
        // retorna a mensagem
        $this->resposta->assertJson(json_encode(['message' => 'Não Autorizado']), 'Não Autorizado');
    }
    // Realizar o teste de retornar a lista de usuarios acessando com o perfil (usuario)
    public function testListarUsuariosAcessandoComPerfilUsuario()
    {
        // realiza a autenticação
        $this->resposta = $this->post('api/auth/login', $this->dadosUsuarioPerfilTipoUsuario());
        // retorna o status da autenticação
        $this->resposta->assertResponseOk();
        // realiza a listagem de usuarios
        $this->listarUsuarios();
        // retorna o status 401
        $this->resposta->assertResponseStatus(401);
    }

    // Realizar o teste de retornar a lista de usuarios acessando com o perfil (Super)
    public function testListarUsuariosAcessandoComPerfilSuper()
    {
        // realiza a autenticação
        $this->resposta = $this->post('api/auth/login', $this->dadosUsuarioPerfilSuper());
        // retorna o status da autenticação
        $this->resposta->assertResponseOk();
        // realiza a listagem de usuarios
        $this->listarUsuarios();
        // retorna o status 200
        $this->resposta->assertResponseOk();
    }
    // cadastrar um usuario sem os dados preenchidos
    public function testCadastrarUsuarioVazio()
    {
        $usuario = [
            'name' => '',
            'email' => '',
            'password' => ''
        ];
        // realiza o cadastro
        $this->resposta = $this->json('post', 'api/auth/novo_usuario/cadastrar', $usuario);
        // retorna o status 422 (por conta que pede os campos requiridos)
        $this->resposta->assertResponseStatus(422);
        // verifica se vem vazio
        $this->assertNull($this->resposta->getResult());
    }
    // metodo resposnsanvel por consultar a lista de usuario
    private function listarUsuarios()
    {
        // realiza a verificação
        $this->resposta = $this->json('get', 'api/usuario/listar');
        // retorna a resposta
        return $this->resposta;
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
