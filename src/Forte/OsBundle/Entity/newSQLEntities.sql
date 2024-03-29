CREATE TABLE forte_os (
id INT AUTO_INCREMENT NOT NULL, 
id_cliente INT NOT NULL,
eqto INT NOT NULL, 
id_defeito INT NOT NULL, 
id_reparo LONGTEXT NOT NULL COMMENT'(DC2Type:array)', 
id_situacao INT NOT NULL, 
id_tecnico INT NOT NULL, 
data_abertura DATETIME NOT NULL, 
data_fechamento DATETIME NOT NULL, 
valorPecas NUMERIC(10, 0) NOT NULL, 
valorMaoObra NUMERIC(10, 0) NOT NULL, 
desconto NUMERIC(10, 0) NOTNULL, 
valorTotal NUMERIC(10, 0) NOT NULL, 
PRIMARY KEY(id)) 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci ENGINE = InnoDB;



CREATE TABLE Defeitos (
id INT AUTO_INCREMENT NOT NULL, 
reclamacao VARCHAR(255) NOT NULL, 
PRIMARY KEY(id)) 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci ENGINE = InnoDB;



CREATE TABLE Reparo (
id INT AUTO_INCREMENT NOT NULL, 
servico VARCHAR(255) NOT NULL, 
duracao INT NOT NULL, 
valor NUMERIC(10, 0) NOT NULL, 
PRIMARY KEY(id)) 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci ENGINE = InnoDB;



CREATE TABLE Situacao (
id INT AUTO_INCREMENT NOT NULL, 
posicao VARCHAR(100) NOT NULL, 
PRIMARY KEY(id)) 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci ENGINE = InnoDB;



CREATE TABLE Tecnico (
id INT AUTO_INCREMENT NOT NULL, 
nome VARCHAR(255) NOT NULL, 
email VARCHAR(100) NOT NULL, 
tel VARCHAR(20) NOT NULL, 
PRIMARY KEY(id)) 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci ENGINE = InnoDB;



CREATE TABLE Cliente (
id INT AUTO_INCREMENT NOT NULL, 
nome VARCHAR(255) NOT NULL, 
empresa VARCHAR(255) NOT NULL, 
email VARCHAR(100) NOT NULL, 
PRIMARY KEY(id)) 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci ENGINE = InnoDB;


#Construindo FK:

CREATE TABLE os_reparo (os_id INT NOT NULL, reparo_id INT NOT NULL, INDEX IDX_67
8767373DCA04D1 (os_id), INDEX IDX_67876737F6C0152E (reparo_id), PRIMARY KEY(os_i
d, reparo_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoD
B;
ALTER TABLE os_reparo ADD CONSTRAINT FK_678767373DCA04D1 FOREIGN KEY (os_id) REF
ERENCES forte_os (id);
ALTER TABLE os_reparo ADD CONSTRAINT FK_67876737F6C0152E FOREIGN KEY (reparo_id)
 REFERENCES forte_reparo (id);