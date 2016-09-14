-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.0.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2016-09-13 23:29:17
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for suporte
CREATE DATABASE IF NOT EXISTS `suporte` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `suporte`;


-- Dumping structure for table suporte.t_cliente
CREATE TABLE IF NOT EXISTS `t_cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `de_cliente` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table suporte.t_cliente: ~5 rows (approximately)
/*!40000 ALTER TABLE `t_cliente` DISABLE KEYS */;
INSERT INTO `t_cliente` (`id`, `de_cliente`) VALUES
	(1, 'Condomínio Renascença'),
	(2, 'Condomínio Ibiza'),
	(3, 'Condomínio Paraíso do Atlântico'),
	(4, 'Condomínio Victoria Club'),
	(5, 'Condomínio Villas do Atlântico');
/*!40000 ALTER TABLE `t_cliente` ENABLE KEYS */;


-- Dumping structure for table suporte.t_suporte
CREATE TABLE IF NOT EXISTS `t_suporte` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_protocolo` int(10) DEFAULT NULL,
  `tp_ocorrencia` char(1) DEFAULT NULL,
  `dt_reclamacao` datetime DEFAULT NULL,
  `de_atendente` varchar(70) DEFAULT NULL,
  `de_condominio` varchar(50) DEFAULT NULL,
  `de_cliente` varchar(100) DEFAULT NULL,
  `de_email_cliente` varchar(100) DEFAULT NULL,
  `nu_telefone` varchar(10) DEFAULT NULL,
  `de_reclamacao` text,
  `de_setor_responsavel` text COMMENT 'Criar tabelas de setores',
  `st_status` char(1) DEFAULT NULL,
  `de_avaliacao` text,
  `dt_estimada` text COMMENT 'Data estimada para resolver o problema',
  `de_solucao` text COMMENT 'Descrição da solução',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nu_protocolo` (`nu_protocolo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table suporte.t_suporte: ~1 rows (approximately)
/*!40000 ALTER TABLE `t_suporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_suporte` ENABLE KEYS */;


-- Dumping structure for table suporte.t_usuarios
CREATE TABLE IF NOT EXISTS `t_usuarios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nivel` int(1) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Dumping data for table suporte.t_usuarios: 2 rows
/*!40000 ALTER TABLE `t_usuarios` DISABLE KEYS */;
INSERT INTO `t_usuarios` (`id`, `nome`, `email`, `senha`, `nivel`, `data_cadastro`, `status`) VALUES
	(34, 'ddd', '', NULL, NULL, NULL, NULL),
	(33, '', '', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `t_usuarios` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
