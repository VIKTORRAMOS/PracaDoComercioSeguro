-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
-- Host: localhost    Database: cadastro
-- ------------------------------------------------------

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
-- Estrutura da tabela `cidadao`
--

DROP TABLE IF EXISTS `cidadao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cidadao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `contato` varchar(11) NOT NULL,
  `problema` enum('F','L') DEFAULT NULL,
  `descricao` text,
  `status` enum('Pendente','Resolvido','Não Resolvido') DEFAULT 'Pendente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dados da tabela `cidadao`
--

LOCK TABLES `cidadao` WRITE;
/*!40000 ALTER TABLE `cidadao` DISABLE KEYS */;
INSERT INTO `cidadao` VALUES 
(1,'André Barbosa','10293847566','98930112233','F','Furto de bicicleta em frente ao mercado','Pendente'),
(2,'Cláudia Mendes','56473829100','98931223344','L','Poste sem luz há mais de uma semana','Pendente'),
(3,'Roberto Lima','91827364500','98932334455','F','Furto de celular em praça pública','Pendente'),
(4,'Tatiane Alves','83726194500','98933445566','L','Oscilação de energia frequente','Pendente'),
(5,'Paulo Henrique','72635481900','98934556677','F','Furto de objetos do carro','Pendente'),
(6,'Julio César','61524397800','98935667788','L','Lâmpadas queimadas na rua','Pendente'),
(7,'Simone Castro','50413286700','98936778899','F','Furto em residência durante ausência','Pendente'),
(8,'Daniel Rocha','49302175600','98937889900','L','Queda de energia constante à noite','Pendente'),
(9,'Priscila Gomes','38291064500','98938990011','F','Furto de bolsa em ponto de ônibus','Pendente'),
(10,'Fernando Teixeira','27180953400','98939001122','L','Poste com luz fraca e piscando','Pendente'),
(11,'Bianca Ribeiro','16079842300','98940112233','F','Furto de equipamentos em comércio','Pendente'),
(12,'Rogério Nunes','04968731200','98941223344','L','Falta de iluminação em área pública','Pendente'),
(13,'Débora Freitas','93857620100','98942334455','F','Tentativa de furto em residência','Pendente'),
(14,'Márcio Carvalho','82746519000','98943445566','L','Energia instável danificando aparelhos','Pendente'),
(15,'Carla Moura','71635408900','98944556677','F','Furto de bicicleta na escola','Pendente'),
(16,'Leandro Santos','60524397810','98945667788','L','Rua completamente sem iluminação','Pendente'),
(17,'Patrícia Barros','59413286710','98946778899','F','Furto de celular em transporte público','Pendente'),
(18,'Vitor Fernandes','48302175610','98947889900','L','Poste apagado há vários dias','Pendente'),
(19,'Natália Costa','37291064510','98948990011','F','Furto de objetos no quintal','Pendente'),
(20,'Hugo Almeida','26180953410','98949001122','L','Quedas frequentes de energia','Pendente'),
(21,'yurisam110','22422422421','98933445566','F','asdasdasd','Não Resolvido');
/*!40000 ALTER TABLE `cidadao` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;