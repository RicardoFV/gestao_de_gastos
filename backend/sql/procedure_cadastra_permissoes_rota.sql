DELIMITER //
-- responsavel por cadastrar as rotas que o perfil (2) Uusuario não tera acesso
create procedure proc_permissao_rota()
begin
	-- cria as permissoes
	insert into permissao_rota(perfil_id, rota_id) values
    (2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (2, 7),
    (2, 8);
end;