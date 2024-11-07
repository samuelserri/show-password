-- cria o banco de dados
create database filmesdb;

-- instrução perigosa, ela exclui TUDO!!!
-- drop database filmesdb;

-- seleciona o banco para uso
use filmesdb;

-- cria a tabela de filme
create table filme (
	id int auto_increment primary key,
	titulo varchar(255) not null,
	ano int not null, 
	-- tipo de dado para texto gigantes.
	-- nem todo DB vai ter esse tipo
	descricao text
);


select * from filme;
select count(*) from filme;

-- delete from filme;
