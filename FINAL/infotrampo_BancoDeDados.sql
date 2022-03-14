-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_infotrampo
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `tb_denuncia`
--

DROP TABLE IF EXISTS `tb_denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_denuncia` (
  `id_denuncia` int NOT NULL AUTO_INCREMENT,
  `descricao_denuncia` longtext,
  `id_autorDenuncia` int DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `data_denuncia` datetime DEFAULT NULL,
  `id_publicacaoDenunciada` int DEFAULT NULL,
  PRIMARY KEY (`id_denuncia`),
  KEY `fk_id_autorDenuncia` (`id_autorDenuncia`),
  KEY `fk_id_publicacaoDenunciada` (`id_publicacaoDenunciada`),
  CONSTRAINT `fk_id_autorDenuncia` FOREIGN KEY (`id_autorDenuncia`) REFERENCES `tb_users` (`id`),
  CONSTRAINT `fk_id_publicacaoDenunciada` FOREIGN KEY (`id_publicacaoDenunciada`) REFERENCES `tb_publicacao` (`id_publicacao`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_denuncia`
--

LOCK TABLES `tb_denuncia` WRITE;
/*!40000 ALTER TABLE `tb_denuncia` DISABLE KEYS */;
INSERT INTO `tb_denuncia` VALUES (6,'Odeio Ingles >:(',30,'inativo','2022-03-10 02:30:37',4),(7,'Demonio é coisa do diabo D:',30,'ativo','2022-03-10 02:31:02',6),(8,'Não gosto de quem se exercita ',30,'inativo','2022-03-10 03:36:41',5),(9,'30 reais é um roubo muito caro não gostei :(',30,'ativo','2022-03-11 23:34:10',4),(10,'Odeio o luan >:(',27,'ativo','2022-03-14 21:19:58',5);
/*!40000 ALTER TABLE `tb_denuncia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_publicacao`
--

DROP TABLE IF EXISTS `tb_publicacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_publicacao` (
  `id_publicacao` int NOT NULL AUTO_INCREMENT,
  `tipo_publicacao` enum('Trabalhador','Empregador') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data_publicacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_autor` int DEFAULT NULL,
  PRIMARY KEY (`id_publicacao`),
  KEY `fk_user` (`id_autor`),
  CONSTRAINT `fk_user` FOREIGN KEY (`id_autor`) REFERENCES `tb_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_publicacao`
--

LOCK TABLES `tb_publicacao` WRITE;
/*!40000 ALTER TABLE `tb_publicacao` DISABLE KEYS */;
INSERT INTO `tb_publicacao` VALUES (4,'Trabalhador','Dou aula de ingles na região do Centro','Aulas de Inglês do iniciante ao avançado, possuo certificação Cobro 30 Reais por hora aula .','Parana','Campo Largo','2022-03-08 18:11:19',27),(5,'Trabalhador','Personal Trainer barato em toda a região de foz do iguaçu','Sou personal trainer atendo em toda a cidade e cobro apenas 20 reais a hora','Parana','Foz Do iguaçu','2022-03-08 18:17:42',28),(6,'Empregador','Estou contratando Exorcistas','Tenho vaga para exorcistas iniciantes, o salario é de 1000 reais por mês +plano de saúde.\r\n','Parana','Cascavel','2022-03-09 18:04:15',30),(7,'Empregador','Teste vo apagar','aaaaaaaaa','Parana','Cascavel','2022-03-14 20:29:54',30),(8,'Empregador','Tenho Vaga para carpinteiro','Estou precisando de um carpinteiro, interessados chamar no email','Parana','Cascavel','2022-03-14 21:18:49',27);
/*!40000 ALTER TABLE `tb_publicacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_user` enum('cliente','administrador') DEFAULT 'cliente',
  `nome` varchar(140) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `senha` varchar(155) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `descricao` longtext,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (27,'cliente','JACK','123456','$2y$10$LxqbNG68/oWQgpiHn2tmC.XLGtZTOwvEwGvSAmHfV9caevm4OlDeW','JACK@JACK','HIT THE ROAD JACK','1999-01-01'),(28,'administrador','Luan Da Silva','123456789','$2y$10$zxqMpw733mxMQfqmVIJsV.MY1AjHU293ymHwZCG2SA1R34frjyGwy','luan@luan','Sou personal trainer ','2000-10-09'),(30,'administrador','Xiao Alatus','666666666','$2y$10$y31DOq0HQdo3W78Ot/1NxOXxu8xy.Qhv2p6HJWe14KHGwAAMEFZEC','xiao@xiao','Sou matador de demônios, exorcista profissional com mais de 2000 anos de experiência.','0001-01-01'),(31,'cliente','Jotaro Kujo','0101010101','$2y$10$AL4hOUCukgcDMNgHYFUp2u.ksdXDyX7f3/b1sgmflQEqRHHi7ZDxe','jo@jojo','a','2000-10-10'),(32,'cliente','Diluc','10000000000','$2y$10$vsUAq79X64P/gCJNN1ZIlecVcT8yWicH2hAojVF6AZfY.L.Ol5m9.','diluc@diluc','Vendo vinho, mas odeio quem bebe ','2000-10-10');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_infotrampo'
--

--
-- Dumping routines for database 'bd_infotrampo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-14 18:59:41
