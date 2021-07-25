CREATE TABLE ristorante (
	email varchar(255) NOT NULL,
	nome varchar(255) NOT NULL,
	indirizzo varchar(255) NOT NULL,
	civico  int NOT NULL,
	telefono varchar(20) NOT NULL,
	piva int(5) NOT NULL,
	password varchar(30) NOT NULL,
	image varchar(255) NOT NUll,
	constraint ID_RISTORANTE_ID PRIMARY KEY(piva)
   );

CREATE TABLE pietanza (
	id_pietanza int NOT NULL AUTO_INCREMENT,
	id_ristorante int(5) NOT NULL,
	nome_pietanza varchar(255) NOT NULL,
	descrizione varchar(255) NOT NULL,
	prezzo decimal (15,2) NOT NULL,
	image varchar(255) NOT NULL,
	FOREIGN KEY (id_ristorante) REFERENCES ristorante(piva),
	constraint ID_PIETANZA_ID PRIMARY KEY(id_pietanza)
);

CREATE TABLE cliente(
	name varchar(255) NOT NULL,
	surname varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	password varchar(30) NOT NULL,
	constraint ID_CLIENTE_ID PRIMARY KEY(email)
);

CREATE TABLE ordine(
	id_ordine int NOT NULL,
	id_cliente varchar(255) NOT NULL,
	id_pietanza int NOT NULL,
	id_ristorante int(5) NOT NULL,
	data date NOT NULL,
	ora time  NOT NULL,
	quantita int NOT NULL,
	prezzo decimal(15,2) NOT NULL,
	via varchar(255) NOT NULL,
	civico int NOT NULL,
	citta varchar(255) NOT NULL,
	cap int NOT NULL,
	FOREIGN KEY (id_pietanza) REFERENCES pietanza (id_pietanza),
	FOREIGN KEY (id_ristorante) REFERENCES ristorante (piva),
	FOREIGN KEY (id_cliente) REFERENCES cliente (email),
	constraint ID_ORDINE_ID PRIMARY KEY(id_ordine, id_pietanza)
);

CREATE TABLE notifica (
	id_notifica int AUTO_INCREMENT NOT NULL,
	id_ordine int NOT NULL,
	id_cliente varchar(255) NOT NULL,
	id_ristorante int(5)  NOT NULL,
	testo varchar(255) NOT NULL,
	stato int NOT NULL,
	orario timestamp DEFAULT CURRENT_TIMESTAMP;
	FOREIGN KEY (id_ordine) REFERENCES ordine (id_ordine),
	FOREIGN KEY (id_ristorante) REFERENCES ristorante (piva),
	FOREIGN KEY (id_cliente) REFERENCES cliente (email),
	constraint ID_NOTIFICA_ID PRIMARY KEY(id_notifica)
);


