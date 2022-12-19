DELIMITER //
-- procedure responsavel por criar as rotas ao 
-- qual determinado perfil não tera acesso
create procedure proc_criar_rotas()
begin
-- criando as rotas com os seus caminhos
	insert into rotas(nome, caminho, acao, created_at, updated_at) values 
		('Tipo', 'App\Http\Controllers\Api\Admin\Tipo\TipoController@cadastrar', 'Cadastrar',NOW(), NOW()),
		('Tipo', 'App\Http\Controllers\Api\Admin\Tipo\TipoController@atualizar', 'Atualizar',NOW(), NOW()),
		('Tipo', 'App\Http\Controllers\Api\Admin\Tipo\TipoController@deletar', 'Deletar',NOW(), NOW()),
		('Usuário', 'App\Http\Controllers\Api\Admin\Usuario\UsuarioController@deletar', 'Deletar',NOW(), NOW()),
		('Usuário', 'App\Http\Controllers\Api\Admin\Usuario\UsuarioController@listar', 'Listar',NOW(), NOW()),
		('SubTipo', 'App\Http\Controllers\Api\Admin\Tipo\SubTipoController@cadastrar', 'Cadastrar',NOW(), NOW()),
		('SubTipo', 'App\Http\Controllers\Api\Admin\Tipo\SubTipoController@atualizar', 'Atualizar',NOW(), NOW()),
		('SubTipo', 'App\Http\Controllers\Api\Admin\Tipo\SubTipoController@deletar', 'Deletar',NOW(), NOW()),
        ('carteira', 'App\Http\Controllers\Api\Admin\Carteira\CarteiraController@cadastrarCarteira', 'Cadastrar',NOW(), NOW()),
        ('carteira', 'App\Http\Controllers\Api\Admin\Carteira\CarteiraController@atualizar', 'Atualizar',NOW(), NOW());

end;


