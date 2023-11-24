-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2023 at 07:23 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `data_nasc` date NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `foto_perfil` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `senha`, `email`, `cpf`, `telefone`, `sexo`, `data_nasc`, `cidade`, `estado`, `endereco`, `foto_perfil`) VALUES
(3, 'Diogo', 'Diogo@123', 'diogoferreira965@gmail.com', '164.721.396-79', '(31) 9954-2', 'masculino', '2003-03-23', 'Belo Horizonte', 'MG', 'Rua flores', '');

-- --------------------------------------------------------

--
-- Table structure for table `contratado`
--

DROP TABLE IF EXISTS `contratado`;
CREATE TABLE IF NOT EXISTS `contratado` (
  `idcontratado` int NOT NULL AUTO_INCREMENT,
  `id_prestador` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_serv` int DEFAULT NULL,
  `preco_final` float DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `quantas_pessoas` int DEFAULT NULL,
  PRIMARY KEY (`idcontratado`),
  KEY `id_cliente_idx` (`id_cliente`),
  KEY `id_prestador_idx` (`id_prestador`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contratado`
--

INSERT INTO `contratado` (`idcontratado`, `id_prestador`, `id_cliente`, `id_serv`, `preco_final`, `dia`, `quantas_pessoas`) VALUES
(12, 3, 3, 9, 1.5, '0000-00-00', 20),
(11, 3, 3, 4, 1213, '0000-00-00', 20),
(10, 3, 3, 4, 1213, '2003-03-23', 20),
(9, 3, 3, 8, 2501.3, '2003-03-23', 50),
(8, 3, 3, 7, 5001.23, '2024-03-23', 100),
(7, 3, 4, 4, 1213, '2003-03-23', 20),
(13, 3, 3, 11, 10001.5, '0000-00-00', 20),
(14, 3, 3, 9, 1001.5, '0000-00-00', 20),
(15, 3, 3, 9, 1001.5, '0000-00-00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `prestadores`
--

DROP TABLE IF EXISTS `prestadores`;
CREATE TABLE IF NOT EXISTS `prestadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cnpj_cpf` varchar(18) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `data_nasc` date NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `foto_perfil` blob NOT NULL,
  `perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prestadores`
--

INSERT INTO `prestadores` (`id`, `nome`, `senha`, `email`, `cnpj_cpf`, `telefone`, `sexo`, `data_nasc`, `cidade`, `estado`, `endereco`, `foto_perfil`, `perfil`) VALUES
(3, 'Diogo Estevão Ferreira', 'Diogo@123', 'diogoferreira965@gmail.com', '16.472.139/679', '(31)99542-9780', 'masculino', '2003-03-23', 'Belo Horizonte', 'MG', 'Rua flores', '', '2'),
(4, 'diogo', 'Diogo@123', 'deogoferreira965@gmail.com', '164.721.396-79', '(31) 9954-2', 'masculino', '2003-03-23', 'Belo Horizonte', 'MG', 'Rua flores', '', '2'),
(5, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `servicos_clientes`
--

DROP TABLE IF EXISTS `servicos_clientes`;
CREATE TABLE IF NOT EXISTS `servicos_clientes` (
  `id_serv` int NOT NULL AUTO_INCREMENT,
  `nome_serv` varchar(100) NOT NULL,
  `finalidade` varchar(100) NOT NULL,
  `dias` varchar(50) NOT NULL,
  `cidades` varchar(75) NOT NULL,
  `cliente` varchar(75) NOT NULL,
  `contato` varchar(11) NOT NULL,
  PRIMARY KEY (`id_serv`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicos_prestadores`
--

DROP TABLE IF EXISTS `servicos_prestadores`;
CREATE TABLE IF NOT EXISTS `servicos_prestadores` (
  `id_serv` int NOT NULL AUTO_INCREMENT,
  `nome_serv` varchar(100) NOT NULL,
  `finalidade` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `dias` varchar(50) NOT NULL,
  `cidades` varchar(75) NOT NULL,
  `tam_equipe` int NOT NULL,
  `img_serv` blob NOT NULL,
  `fornecedor` varchar(75) NOT NULL,
  `contato` varchar(15) NOT NULL,
  `pix` varchar(32) NOT NULL,
  `FK_id_prestador` varchar(45) DEFAULT NULL,
  `preco_por_pessoa` float NOT NULL,
  PRIMARY KEY (`id_serv`),
  KEY `FK_id_prestador` (`FK_id_prestador`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servicos_prestadores`
--

INSERT INTO `servicos_prestadores` (`id_serv`, `nome_serv`, `finalidade`, `preco`, `dias`, `cidades`, `tam_equipe`, `img_serv`, `fornecedor`, `contato`, `pix`, `FK_id_prestador`, `preco_por_pessoa`) VALUES
(9, 'Churrasco a noite', 'Churrasco', 1.5, 'Segunda, terça, quarta, quinta, sexta', 'Belo Horizonte', 8, '', 'COTEMIG', '31995429780', '16472139679', '3', 50),
(4, 'shoes', 'shoes', 213, 'shoes', 'shoes', 0, '', 'shoes', 'shoes', 'shoes', '3', 50),
(5, 'shoes', 'shoes', 1, 'shoes', 'shoes', 0, '', 'shoes', 'shoes', 'shoes', '3', 50),
(6, 'shoes', 'shoes', 2.133, 'shoes', 'shoes', 0, '', 'shoes', 'shoes', 'shoes', '3', 50),
(7, 'Festa do pijama', 'shoes', 1.233, 'shoes', 'shoes', 0, '', 'shoes', '31995429780', '130215412', '3', 50),
(8, 'Churrasco de dia', 'Nao sei', 1.302, 'segunda', 'belo horizonte', 30451158, '', 'Diogo', '31995429780', '1590545', '3', 50),
(10, 'Churrasco', 'Casamento', 1.5, 'Segunda, terça, quarta, quinta, sexta', 'Belo Horizonte', 150, '', 'COTEMIG', '31995429780', '159753195', '4', 50),
(11, 'Churrasco', 'asdasd', 1.5, 'Segunda, terça, quarta, quinta, sexta', 'shoes', 3, '', 'COTEMIG', '31995429780', 'shoes', '3', 500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
