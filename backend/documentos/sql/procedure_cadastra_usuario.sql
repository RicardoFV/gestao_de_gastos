DELIMITER //
create procedure cadastro_usuario()
begin
-- verifica se tem usuario,
-- caso retorne 0 significa que nao tem
-- ai e feito a inserçao
if ( select count(*) from usuarios )= 0 then

	-- cria a tabela de permissao
    INSERT INTO perfils(nome, created_at, updated_at) VALUES 
    ('super', NOW(), NOW()),
	('usuario', NOW(), NOW());
    
	insert into usuarios(name, email, password, usuario_id_cadastro, perfil_id, created_at, updated_at)
    values('super', 'superadmin@gmail.com' ,'$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2', 1,1,now(), now());
    -- senha : 12345678
    
    else
		-- retorna o erro
		signal sqlstate '45000' set message_text = 'Tabela já existe usuario, não pode ser inserido';
end if;
END;