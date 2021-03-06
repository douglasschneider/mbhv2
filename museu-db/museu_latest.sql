-- MariaDB dump 10.17  Distrib 10.5.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: museu
-- ------------------------------------------------------
-- Server version	10.5.3-MariaDB-1:10.5.3+maria~bionic

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `valor_total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_item`
--

DROP TABLE IF EXISTS `pedido_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_item` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  UNIQUE KEY `idx_pedido_produto` (`id_pedido`,`id_produto`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `pedido_item_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  CONSTRAINT `pedido_item_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  CONSTRAINT `pedido_item_ibfk_3` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_item`
--

LOCK TABLES `pedido_item` WRITE;
/*!40000 ALTER TABLE `pedido_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_item` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
	`codcat` INT auto_increment NOT NULL,
	`nomcat` varchar(20) NOT NULL,
  PRIMARY KEY (`codcat`)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

INSERT INTO categoria(nomcat) VALUES ('Telefone');
INSERT INTO categoria(nomcat) VALUES ('Teclado');
INSERT INTO categoria(nomcat) VALUES ('Mac');
INSERT INTO categoria(nomcat) VALUES ('Computador');
INSERT INTO categoria(nomcat) VALUES ('Monitor');
INSERT INTO categoria(nomcat) VALUES ('Mouse');
INSERT INTO categoria(nomcat) VALUES ('Joystick');

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor` decimal(10,2),
  `imagem` varchar(1000) NOT NULL,
  `descricao` varchar(128) NOT NULL,
  `expor` char(1) NOT NULL,
  `codcat` INT(11),
  PRIMARY KEY (`id`),
  CONSTRAINT `pro_codcat_fk` FOREIGN KEY (`codcat`) REFERENCES `categoria` (`codcat`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES
    (1,'Computador Dell',1300.00,'787026038594783.jpg','Computador','0', 4),
    (2,'Computador Dell Novo',4500.00,'dell_novo.jpg','Computador','0', 4),
    (3,'Computador Dell Usado',3000.00,'dell_usado.jpg','Computador usado por Steve Jobs','0', 4),
    (4,'Mini Mac',6500.00,'mini_mac.jpg','Primeiro Mac 1990','1', 3),
    (5,'Mac Book Pro',6750.00,'mac_pro.jpg','Mac Pro de Jobs antes de morrer','1', 3),
    (6,'Teclado Mecanico',400.00,'teclado_mecanico.jpg','Teclado mecanico de Linus','0', 2),
    (7,'MK Básico',500.00,'mk_basico.jpg','MK doado por Douglas.','0', 4),
    (8,'MSDOS 1982',8000.00,'msdos.jpg','Computador UNOESC 1988','0', 4),
    (9,'VOIP',512.00,'voip.jpg','Mini VOIP','0', 1)
;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `telefone` int(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

CREATE TABLE `instituicao` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `matriz` char(1) ,
  `descricao` varchar(200),
  `imagem` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `instituicao` VALUES
    ('1','MBHV2 MATRIZ SC','1','Instituição localizada em SC, onde está ativa desde 2004 fazendo o seu papel no mercado de exposição.','bandeira_sc.png'),
    ('2','MBHV2 FILIAL SP',null,'Instituição localizada em SP, onde está ativa desde 2004 fazendo o seu papel no mercado de exposição.','bandeira_sp.png'),
    ('3','MBHV2 FILIAL BH',null,'Instituição localizada em BH, onde está ativa desde 2004 fazendo o seu papel no mercado de exposição.','bandeira_bahia.png')
;

CREATE TABLE `visita` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `fone` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `data` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `produto_visita` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_produto` int(10) NOT NULL,
  `data` date NOT NULL, 
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=latin1;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Auditoria do sistema
-- Tabela para auditoria do sistema

CREATE TABLE `historico`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`horario` timestamp NOT NULL,
	`acao` varchar(10) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Triggers de auditoria
CREATE TRIGGER `tgr_objeto_update` AFTER UPDATE ON `produto`
FOR EACH ROW INSERT INTO historico(horario, acao) VALUES(NOW(), 'UPDATE');

CREATE TRIGGER `tgr_objeto_insert` AFTER INSERT ON produto
FOR EACH ROW INSERT INTO historico(horario, acao) VALUES(NOW(), 'INSERT');

CREATE TRIGGER `tgr_objeto_delete` AFTER DELETE ON produto
FOR EACH ROW INSERT INTO historico(horario, acao) VALUES(NOW(), 'DELETE');

-- Dump completed on 2020-05-31 20:37:53

