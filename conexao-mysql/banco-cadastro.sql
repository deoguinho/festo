/* SCRIPT PARA CRIAÇÃO DO BANCO NO SQL */

create database cadastro;

use cadastro;

/* TABELA DOS USUÁRIOS */

CREATE TABLE prestadores (
  `id` INT NOT NULL auto_increment,
  `nome` VARCHAR(75) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `cnpj_cpf` varchar(18) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `sexo` VARCHAR(9) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(20) NOT NULL,
  `endereco` VARCHAR(90) NOT NULL,
  `foto_perfil` BLOB not null,
  PRIMARY KEY (`id`)
  );

/* TABELA DOS SERVIÇOS */

CREATE TABLE servicos_prestadores (
  `id_serv` INT NOT NULL auto_increment,
  `nome_serv`  VARCHAR(100) NOT NULL,
  `finalidade` VARCHAR(100) NOT NULL,
  `preco` FLOAT NOT NULL,
  `dias` VARCHAR(50) NOT NULL,
  `cidades` VARCHAR(75) NOT NULL,
  `tam_equipe` INT NOT NULL,
  `img_serv` blob not null,
  `fornecedor` VARCHAR(75) NOT NULL,
  `contato` VARCHAR(15) NOT NULL,
  `pix` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id_serv`)
  );

  /* TABELA DOS USUÁRIOS_CLIENTES */

  CREATE TABLE clientes (
  `id` INT NOT NULL auto_increment,
  `nome` VARCHAR(75) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `cpf` varchar(14) not null,
  `telefone` VARCHAR(15) NOT NULL,
  `sexo` VARCHAR(9) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(20) NOT NULL,
  `endereco` VARCHAR(90) NOT NULL,
  `foto_perfil` BLOB not null,
  PRIMARY KEY (`id`)
  );

/* TABELA DOS SERVIÇOS_CLIENTES */

CREATE TABLE servicos_clientes (
  `id_serv` INT NOT NULL auto_increment,
  `nome_serv`  VARCHAR(100) NOT NULL,
  `finalidade` VARCHAR(100) NOT NULL,
  `dias` VARCHAR(50) NOT NULL,
  `cidades` VARCHAR(75) NOT NULL,
  `cliente` VARCHAR(75) NOT NULL,
  `contato` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id_serv`)
  );
