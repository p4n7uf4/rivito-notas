create table pedidos
(
	id int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    endereco varchar(255) NOT NULL,
    bairro varchar(100) NOT NULL,
    municipio varchar(100) NOT NULL,
    fone varchar(10) NOT NULL,
    cpf varchar(30) NOT NULL,
    pagamento varchar(100) not null,
    quantidade1 int not null,
    descricao1 varchar(255) not null,
    valor1 float not null,
    quantidade2 int,
    descricao2 varchar(255),
    valor2 float,
    quantidade3 int,
    descricao3 varchar(255),
    valor3 float,
    quantidade4 int,
    descricao4 varchar(255),
    valor4 float,
    quantidade5 int,
    descricao5 varchar(255),
    valor5 float,
    frete float not null,
    montagem float not null,
    prazo int not null,
    vendedor varchar(100) not null
);