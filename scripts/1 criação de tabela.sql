CREATE TABLE usuarios(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null, 
    email varchar(50) not null unique,
    telefone varchar(15) not null,
    data_nascimento date not null, 
    cpf varchar(15) not null unique

);

CREATE TABLE categorias (
	id int PRIMARY key AUTO_INCREMENT, 
    categoria varchar(100) not null
);

CREATE TABLE artigos(
	id int PRIMARY KEY AUTO_INCREMENT, 
    texto text(1000) not null, 
    id_categoria int, 
    id_autor int, 
    
    FOREIGN key(id_categoria) REFERENCES categorias(id),
    FOREIGN key(id_autor) REFERENCES usuarios(id)
);