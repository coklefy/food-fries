CREATE TABLE ristorante (
	id_ristorante int NOT NULL AUTO_INCREMENT,
	email_ristorante varchar(255) NOT NULL,
	nome_ristorante varchar(255) NOT NULL,
	indirizzo_ristorante varchar(255) NOT NULL,
	piva int NOT NULL,
	constraint ID_RISTORANTE_ID PRIMARY KEY(id_ristorante)
   );

CREATE TABLE pietanza (
	id_pietanza int NOT NULL AUTO_INCREMENT,
	id_ristorante int NOT NULL,
	nome_pietanza varchar(255) NOT NULL,
	descrizione varchar(255) NOT NULL,
	prezzo decimal(15,2) NOT NULL,
	image varchar(255) NOT NULL,
	FOREIGN KEY (id_ristorante) REFERENCES ristorante(id_ristorante),
	constraint ID_PIETANZA_ID PRIMARY KEY(id_pietanza,id_ristorante)
);

CREATE TABLE cliente(
	id_cliente int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	surname varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	password varchar(30) NOT NULL,
	constraint ID_CLIENTE_ID PRIMARY KEY(id_cliente)
);

CREATE TABLE ordine(
	id_ordine int NOT NULL,
	id_cliente int NOT NULL,
	id_pietanza int NOT NULL,
	id_ristorante int NOT NULL,
	data date NOT NULL,
	ora time  NOT NULL,
	prezzo decimal(15,2) NOT NULL,
	FOREIGN KEY (id_pietanza,id_ristorante) REFERENCES pietanza (id_pietanza,id_ristorante),
	FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
	constraint ID_ORDINE_ID PRIMARY KEY(id_ordine)
);

