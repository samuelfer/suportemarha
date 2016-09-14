-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.0.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2016-09-11 19:01:25
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for suporte
CREATE DATABASE IF NOT EXISTS `suporte` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `suporte`;


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table suporte.t_suporte: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_suporte` DISABLE KEYS */;
INSERT INTO `t_suporte` (`id`, `dt_cadastro`, `nu_protocolo`, `tp_ocorrencia`, `dt_reclamacao`, `de_atendente`, `de_condominio`, `de_cliente`, `de_email_cliente`, `nu_telefone`, `de_reclamacao`, `de_setor_responsavel`, `st_status`, `de_avaliacao`, `dt_estimada`, `de_solucao`) VALUES
	(1, NULL, 293003, 'n', '2016-09-10 00:00:00', 'nu_protocolo', 'nu_protocolo', 'nu_protocolo', 'samuelf_sant@hotmail.com', 'nu_protoco', 'nu_protocolo', 'nu_protocolo', '2', 'nu_protocolo', '2016-09-30', 'nu_protocolo'),
	(2, NULL, 293003, 'n', '2016-09-15 00:00:00', 'nu_protocolo', 'nu_protocolo', 'nu_protocolo', 'samuelf_sant@hotmail.com', 'nu_protoco', 'nu_protocolo', 'nu_protocolo', '6', 'nu_protocolo', '2016-09-15', 'nu_protocolo'),
	(3, NULL, 293003, 'n', '2016-09-08 00:00:00', 'nu_protocolo', 'nu_protocolo', 'nu_protocolo', 'samuelf_sant@hotmail.com', 'nu_protoco', 'nu_protocolo', 'nu_protocolo', '5', 'nu_protocolo', '2016-09-01', 'nu_protocolo');
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table suporte.t_usuarios: 1 rows
/*!40000 ALTER TABLE `t_usuarios` DISABLE KEYS */;
INSERT INTO `t_usuarios` (`id`, `nome`, `email`, `senha`, `nivel`, `data_cadastro`, `status`) VALUES
	(1, 'samuel', 'samuel@hotmail.com', '123', NULL, NULL, NULL),
	(2, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(3, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(4, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(5, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(6, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(7, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(8, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL),
	(9, 'Marhashi', 'samuelf_sant@hotmail.com', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `t_usuarios` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
