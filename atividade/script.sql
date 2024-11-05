-- criar de tabela usuario
create table usuario (
    id int auto_increment primary key,
	nome varchar(255) not null
);


-- criar de tabela favorito
create table favorito (
    usuario_id int,
    filme_id int,
    primary key (usuario_id, filme_id),
    foreign key (usuario_id) references usuario(id),
    foreign key (filme_id) references filme(id)
);


-- instrução para retornar um unico registro por id
SELECT * FROM filme WHERE id = 1;



--instrução para retornar apenas nome e ano de todos
SELECT titulo, ano FROM filme;


--instrução para atualizar um registro por id
UPDATE filme SET titulo = "teste"  WHERE id = 2;


--instrução para excluir um registro por id
DELETE FROM filme WHERE id = 2;


-- Exemplo: Usuário com id = 1 adiciona o filme com id = 2 aos favoritos
INSERT INTO favorito (usuario_id, filme_id) VALUES (1, 2);



