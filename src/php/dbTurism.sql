CREATE DATABASE dbTurism
USE dbTurism

CREATE TABLE unidades(
	idUnidade INT IDENTITY PRIMARY KEY,
	nomeSede VARCHAR(50) NOT NULL,
	telefoneSede CHAR(15) NOT NULL,
	paisSede VARCHAR(20) NOT NULL,
	estadoSede VARCHAR(25) NOT NULL,	
	cidadeSede VARCHAR(30) NOT NULL,
	bairroSede VARCHAR(40) NOT NULL,
	ruaSede VARCHAR(40) NOT NULL,
	numeroSede VARCHAR(5) NOT NULL
)

CREATE TABLE usuario(
	idUser INT IDENTITY PRIMARY KEY,
	nomeUser VARCHAR(50) NOT NULL,
	emailUser VARCHAR(50) NOT NULL,
	senhaUser VARCHAR(25) NOT NULL,
	telefoneUser CHAR(12) NOT NULL,
	paisUser VARCHAR(20) NOT NULL,
	estadoUser VARCHAR(25) NOT NULL,
	cidadeUser VARCHAR(30) NOT NULL,
	ruaUser VARCHAR(40) NOT NULL,
	bairroUser VARCHAR(40) NOT NULL,
	numeroUser VARCHAR(5) NOT NULL
)

SELECT * FROM usuario

CREATE TABLE programaIntercambio(
	idPrograma INT IDENTITY PRIMARY KEY,
	destino VARCHAR(50) NOT NULL,
	duracao VARCHAR(30) NOT NULL,
	tipoAcomodacao VARCHAR(40) NOT NULL,
	preco MONEY NOT NULL
)

SELECT * FROM programaIntercambio

CREATE TABLE contatos(
	idContato INT IDENTITY PRIMARY KEY,
	nomeContato VARCHAR(50) NOT NULL,
	emailContato VARCHAR(50) NOT NULL,
	telefoneContato CHAR(15) NOT NULL,
	mensagem VARCHAR(250) NOT NULL,
	idPrograma INT CONSTRAINT FKidProgramaCt FOREIGN KEY REFERENCES programaIntercambio (idPrograma), 
	idUnidade INT CONSTRAINT FKidUnidadeCt FOREIGN KEY REFERENCES unidades(idUnidade)
)

SELECT * FROM contatos

CREATE TABLE avaliacoes(
	idAvaliacao INT IDENTITY PRIMARY KEY,
	nota CHAR(2) NOT NULL,
	comentario VARCHAR(200),
	dataAvaliacao DATETIME NOT NULL,
	idPrograma INT CONSTRAINT FKidPrograma FOREIGN KEY REFERENCES programaIntercambio (idPrograma),
	idUser INT CONSTRAINT FKidUser FOREIGN KEY REFERENCES usuario (idUser)
)

SELECT * FROM avaliacoes

CREATE TABLE reservas(
	idReserva INT IDENTITY PRIMARY KEY,
	dataInicio DATE NOT NULL,
	dataFim DATE NOT NULL,
	precoTotal MONEY NOT NULL,
	idPrograma INT CONSTRAINT FKidProgramaReserva FOREIGN KEY REFERENCES programaIntercambio (idPrograma),
	idUser INT CONSTRAINT FKidUserReserva FOREIGN KEY REFERENCES usuario (idUser)
)

SELECT * FROM reservas

CREATE TABLE pagamentos(
	idPagamento INT IDENTITY PRIMARY KEY,
	valor MONEY NOT NULL,
	metodoPagamento VARCHAR(20) NOT NULL,
	dataPagamento DATETIME NOT NULL,
	idReserva INT CONSTRAINT FKidReserva FOREIGN KEY REFERENCES reservas (idReserva)
)

SELECT * FROM pagamentos

