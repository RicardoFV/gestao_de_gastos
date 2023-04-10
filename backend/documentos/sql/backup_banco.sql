-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: controle_gastos
-- ------------------------------------------------------
-- Server version	5.7.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carteiras`
--

DROP TABLE IF EXISTS `carteiras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carteiras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vencimento` date NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeti` tinyint(1) NOT NULL DEFAULT '0',
  `quantidade` int(11) NOT NULL DEFAULT '0',
  `tipo_id` int(10) unsigned NOT NULL,
  `subtipo_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carteiras_tipo_id_foreign` (`tipo_id`),
  KEY `carteiras_subtipo_id_foreign` (`subtipo_id`),
  KEY `carteiras_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `carteiras_subtipo_id_foreign` FOREIGN KEY (`subtipo_id`) REFERENCES `subtipos` (`id`),
  CONSTRAINT `carteiras_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`),
  CONSTRAINT `carteiras_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carteiras`
--

LOCK TABLES `carteiras` WRITE;
/*!40000 ALTER TABLE `carteiras` DISABLE KEYS */;
INSERT INTO `carteiras` VALUES (1,'Prestação da Casa','2023-05-10',450,'Prestação da casa',1,1,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(2,'Prestação da Casa','2023-06-10',450,'Prestação da casa',1,2,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(3,'Prestação da Casa','2023-07-10',450,'Prestação da casa',1,3,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(4,'Prestação da Casa','2023-08-10',450,'Prestação da casa',1,4,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(5,'Prestação da Casa','2023-09-10',450,'Prestação da casa',1,5,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(6,'Prestação da Casa','2023-10-10',450,'Prestação da casa',1,6,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(7,'Prestação da Casa','2023-11-10',450,'Prestação da casa',1,7,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(8,'Prestação da Casa','2023-12-10',450,'Prestação da casa',1,8,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(9,'Prestação da Casa','2024-01-10',450,'Prestação da casa',1,9,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(10,'Prestação da Casa','2024-02-10',450,'Prestação da casa',1,10,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(11,'Prestação da Casa','2024-03-10',450,'Prestação da casa',1,11,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(12,'Prestação da Casa','2024-04-10',450,'Prestação da casa',1,12,1,1,2,'2023-04-10 00:16:05','2023-04-10 00:16:05',NULL),(13,'Salario do mes','2023-04-08',4500,'Recebido o salario do mes',0,1,4,4,2,'2023-04-10 00:19:59','2023-04-10 00:19:59',NULL);
/*!40000 ALTER TABLE `carteiras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2022_07_25_113433_perfil',1),(2,'2022_07_25_113502_usuario',1),(3,'2022_07_25_113614_tipo',1),(4,'2022_07_25_113710_subtipo',1),(5,'2022_07_25_113808_carteira',1),(6,'2022_07_30_183859_rota',1),(7,'2022_07_30_183951_permissaorota',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfils`
--

DROP TABLE IF EXISTS `perfils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfils`
--

LOCK TABLES `perfils` WRITE;
/*!40000 ALTER TABLE `perfils` DISABLE KEYS */;
INSERT INTO `perfils` VALUES (1,'super','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(2,'usuario','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL);
/*!40000 ALTER TABLE `perfils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissao_rota`
--

DROP TABLE IF EXISTS `permissao_rota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissao_rota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_id` int(10) unsigned NOT NULL,
  `rota_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissao_rota_perfil_id_foreign` (`perfil_id`),
  KEY `permissao_rota_rota_id_foreign` (`rota_id`),
  CONSTRAINT `permissao_rota_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`),
  CONSTRAINT `permissao_rota_rota_id_foreign` FOREIGN KEY (`rota_id`) REFERENCES `rotas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao_rota`
--

LOCK TABLES `permissao_rota` WRITE;
/*!40000 ALTER TABLE `permissao_rota` DISABLE KEYS */;
INSERT INTO `permissao_rota` VALUES (1,2,1,NULL,NULL),(2,2,2,NULL,NULL),(3,2,3,NULL,NULL),(4,2,4,NULL,NULL),(5,2,5,NULL,NULL),(6,2,6,NULL,NULL),(7,2,7,NULL,NULL),(8,2,8,NULL,NULL),(9,1,9,NULL,NULL),(10,1,10,NULL,NULL);
/*!40000 ALTER TABLE `permissao_rota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rotas`
--

DROP TABLE IF EXISTS `rotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rotas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caminho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotas`
--

LOCK TABLES `rotas` WRITE;
/*!40000 ALTER TABLE `rotas` DISABLE KEYS */;
INSERT INTO `rotas` VALUES (1,'Tipo','AppHttpControllersApiAdminTipoTipoController@cadastrar','Cadastrar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(2,'Tipo','AppHttpControllersApiAdminTipoTipoController@atualizar','Atualizar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(3,'Tipo','AppHttpControllersApiAdminTipoTipoController@deletar','Deletar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(4,'Usuário','AppHttpControllersApiAdminUsuarioUsuarioController@deletar','Deletar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(5,'Usuário','AppHttpControllersApiAdminUsuarioUsuarioController@listar','Listar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(6,'SubTipo','AppHttpControllersApiAdminTipoSubTipoController@cadastrar','Cadastrar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(7,'SubTipo','AppHttpControllersApiAdminTipoSubTipoController@atualizar','Atualizar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(8,'SubTipo','AppHttpControllersApiAdminTipoSubTipoController@deletar','Deletar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(9,'carteira','AppHttpControllersApiAdminCarteiraCarteiraController@cadastrarCarteira','Cadastrar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(10,'carteira','AppHttpControllersApiAdminCarteiraCarteiraController@atualizar','Atualizar','2023-04-09 23:11:20','2023-04-09 23:11:20',NULL);
/*!40000 ALTER TABLE `rotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subtipos`
--

DROP TABLE IF EXISTS `subtipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subtipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subtipos_tipo_id_foreign` (`tipo_id`),
  CONSTRAINT `subtipos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subtipos`
--

LOCK TABLES `subtipos` WRITE;
/*!40000 ALTER TABLE `subtipos` DISABLE KEYS */;
INSERT INTO `subtipos` VALUES (1,'Prestação da casa',2,'2023-04-09 23:49:48','2023-04-09 23:49:48',NULL),(2,'Pagamento da Agua',2,'2023-04-09 23:50:02','2023-04-09 23:50:02',NULL),(3,'Mensalidade Escolar',1,'2023-04-09 23:52:22','2023-04-09 23:52:22',NULL),(4,'Salario Mensal',4,'2023-04-09 23:53:02','2023-04-09 23:53:02',NULL),(5,'Pagamento diversos',5,'2023-04-09 23:53:57','2023-04-09 23:53:57',NULL);
/*!40000 ALTER TABLE `subtipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atividade` enum('DESPESA','RECEITA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (1,'Escola','DESPESA','2023-04-09 23:46:13','2023-04-09 23:46:13',NULL),(2,'Casa','DESPESA','2023-04-09 23:46:39','2023-04-09 23:46:39',NULL),(3,'Telefone','DESPESA','2023-04-09 23:46:50','2023-04-09 23:46:50',NULL),(4,'Salario','RECEITA','2023-04-09 23:48:21','2023-04-09 23:48:21',NULL),(5,'Frelancer','RECEITA','2023-04-09 23:48:31','2023-04-09 23:48:31',NULL);
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id_cadastro` int(11) NOT NULL,
  `perfil_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_perfil_id_foreign` (`perfil_id`),
  CONSTRAINT `usuarios_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfils` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'super','superadmin@gmail.com',NULL,'$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2',1,1,NULL,'2023-04-09 23:11:20','2023-04-09 23:11:20',NULL),(2,'Vera Sabrina Novaes','vera_sabrina_novaes@tivit.com.br',NULL,'$2y$10$X8Eq9FyuU9L9yLBg4o966en2kGYTMgO18TZTv/hRWE21EYMWz.J..',1,2,NULL,'2023-04-09 23:17:54','2023-04-09 23:17:54',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'controle_gastos'
--
/*!50003 DROP PROCEDURE IF EXISTS `cadastro_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `cadastro_usuario`()
begin
-- verifica se tem usuario,
-- caso retorne 0 significa que nao tem
-- ai e feito a inserçao
if ( select count(*) from usuarios )= 0 then

	-- cria a tabela de permissao
    INSERT INTO perfils(nome, created_at, updated_at) VALUES 
    ('super', NOW(), NOW()),
	('usuario', NOW(), NOW());
    
	insert into usuarios(name, email, password, usuario_id_cadastro, perfil_id, created_at, updated_at)
    values('super', 'superadmin@gmail.com' ,'$2y$10$GgmTkF8lJ6/bBhzqCDBm/OO1KMuhRXzBGWgcOFzWYGIlF2uISV/D2', 1,1,now(), now());
    -- senha : 12345678
    
    else
		-- retorna o erro
		signal sqlstate '45000' set message_text = 'Tabela já existe usuario, não pode ser inserido';
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_criar_rotas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `proc_criar_rotas`()
begin
-- criando as rotas com os seus caminhos
	insert into rotas(nome, caminho, acao, created_at, updated_at) values 
		('Tipo', 'App\Http\Controllers\Api\Admin\Tipo\TipoController@cadastrar', 'Cadastrar',NOW(), NOW()),
		('Tipo', 'App\Http\Controllers\Api\Admin\Tipo\TipoController@atualizar', 'Atualizar',NOW(), NOW()),
		('Tipo', 'App\Http\Controllers\Api\Admin\Tipo\TipoController@deletar', 'Deletar',NOW(), NOW()),
		('Usuário', 'App\Http\Controllers\Api\Admin\Usuario\UsuarioController@deletar', 'Deletar',NOW(), NOW()),
		('Usuário', 'App\Http\Controllers\Api\Admin\Usuario\UsuarioController@listar', 'Listar',NOW(), NOW()),
		('SubTipo', 'App\Http\Controllers\Api\Admin\Tipo\SubTipoController@cadastrar', 'Cadastrar',NOW(), NOW()),
		('SubTipo', 'App\Http\Controllers\Api\Admin\Tipo\SubTipoController@atualizar', 'Atualizar',NOW(), NOW()),
		('SubTipo', 'App\Http\Controllers\Api\Admin\Tipo\SubTipoController@deletar', 'Deletar',NOW(), NOW()),
        ('carteira', 'App\Http\Controllers\Api\Admin\Carteira\CarteiraController@cadastrarCarteira', 'Cadastrar',NOW(), NOW()),
        ('carteira', 'App\Http\Controllers\Api\Admin\Carteira\CarteiraController@atualizar', 'Atualizar',NOW(), NOW());

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_permissao_rota` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `proc_permissao_rota`()
begin
	-- cria as permissoes
	insert into permissao_rota(perfil_id, rota_id) values
    (2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (2, 7),
    (2, 8),
    (1, 9),
    (1, 10);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-09 22:20:30
