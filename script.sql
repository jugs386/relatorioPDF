CREATE DATABASE BIBLIOTECA;
USE BIBLIOTECA;

CREATE TABLE LIVRO(
	codigo int auto_increment primary key,
    titulo varchar(100),
    autor varchar(100),
    ano_publicacao int,
    resumo text
    
);

insert into livro values (null, 'Título do livro', 'Autor do livro', '2025', 'Resumo do livro');

select * from livro;