
-- MySQL dump 10.13  Distrib 5.6.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: caffeeSalem
-- ------------------------------------------------------
-- Server version	5.6.31-0ubuntu0.15.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Categoria`
--

DROP TABLE IF EXISTS `Categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categoria` (
  `idCategoria` int(6) NOT NULL DEFAULT '0',
  `Nombre` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `Index_Categoria` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categoria`
--

LOCK TABLES `Categoria` WRITE;
/*!40000 ALTER TABLE `Categoria` DISABLE KEYS */;
INSERT INTO `Categoria` VALUES (1,'Especialidades','Bebidas tipo caliente de las especialidades de Cafeteria Saleen'),(2,'Pociones','----'),(3,'Tizanas Calientes','-----'),(4,'Tés Mágicos','------'),(5,'Nuestros Familiares','-------'),(6,'Bebidas','--------'),(7,'Bebidas Frías','---------'),(8,'Postres','----------'),(9,'Ensaladas','||||'),(10,'Chapatas','|||||'),(11,'Wraps','||||||'),(12,'Crepas','|||||||'),(13,'Otros','---'),(14,'Chakras y tés','--');
/*!40000 ALTER TABLE `Categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `idCliente` int(8) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `ApellidoPaterno` varchar(30) NOT NULL,
  `ApellidoMaterno` varchar(30) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `Index_Cliente` (`idCliente`,`rfc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DetalleTicket`
--

DROP TABLE IF EXISTS `DetalleTicket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DetalleTicket` (
  `Ticket` int(24) DEFAULT NULL,
  `Producto` int(12) DEFAULT NULL,
  `Cantidad` int(4) NOT NULL,
  `Comentario` varchar(300) DEFAULT NULL,
  `Subtotal` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetalleTicket`
--

LOCK TABLES `DetalleTicket` WRITE;
/*!40000 ALTER TABLE `DetalleTicket` DISABLE KEYS */;
/*!40000 ALTER TABLE `DetalleTicket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Empleado`
--

DROP TABLE IF EXISTS `Empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Empleado` (
  `idEmpleado` int(12) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `ApellidoPaterno` varchar(30) NOT NULL,
  `ApellidoMaterno` varchar(30) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `Edad` int(4) DEFAULT NULL,
  `Genero` char(1) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idEmpleado`),
  UNIQUE KEY `Index_Empleado` (`idEmpleado`,`curp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Empleado`
--

LOCK TABLES `Empleado` WRITE;
/*!40000 ALTER TABLE `Empleado` DISABLE KEYS */;
INSERT INTO `Empleado` VALUES (1,'Carlos',' ',' ',' ',0,'M',' ',1),(2,'Carolina',' ',' ',' ',0,'F',' ',1),(3,'Manzur',' ',' ',' ',0,'F',' ',1),(4,'Alejandro',' ',' ',' ',0,'M','',1),(5,'Juan Jose',' ',' ',' ',0,'M','',1),(6,'Vlad',' ',' ',' ',0,'M','',1);
/*!40000 ALTER TABLE `Empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mesa`
--

DROP TABLE IF EXISTS `Mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mesa` (
  `idMesa` int(4) NOT NULL AUTO_INCREMENT,
  `Tipo` int(4) NOT NULL DEFAULT '1',
  `Descripcion` varchar(200) DEFAULT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idMesa`),
  UNIQUE KEY `Index_Mesa` (`idMesa`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mesa`
--

LOCK TABLES `Mesa` WRITE;
/*!40000 ALTER TABLE `Mesa` DISABLE KEYS */;
INSERT INTO `Mesa` VALUES (1,1,'','Muriel'),(2,1,'','Mago Merlin'),(3,1,'','Bruja de Oeste'),(4,1,'','Bruja de las Nieves'),(5,1,'','Bruja Grimihilde'),(6,1,'','Malefica'),(7,1,'','Morgana'),(8,1,'','Perséfone'),(9,1,'','Norte'),(10,1,'','Madam Mim'),(11,1,NULL,'Ursula'),(12,1,NULL,'Befana'),(13,1,NULL,'Elphaba'),(14,1,NULL,'Nornas'),(15,1,NULL,'Eostre'),(16,1,NULL,'Sabina'),(17,1,NULL,'Medusa'),(18,1,NULL,'Blodewed');
/*!40000 ALTER TABLE `Mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `idProducto` int(12) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Categoria` int(6) DEFAULT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Imagen` blob,
  `Precio` decimal(6,2) NOT NULL,
  `Bebida` tinyint(4) DEFAULT '0',
  `Comida` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idProducto`),
  KEY `Categoria` (`Categoria`),
  CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `Categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (1,'Meiga',1,'Delicioso y dulce caramelo café','',46.00,1,0),(2,'Strega',1,'Exquisita bebida de chocolate menta','',46.00,1,0),(3,'Bruja de las Nieves',1,'Latte positano de coco','',46.00,1,0),(4,'Befana',1,'Exquisito y elegante mocka blanco','',46.00,1,0),(5,'Elfo Negro',1,'Especiado té negro latte mezclado con delicioso sabor canela','',46.00,1,0),(6,'Pumpkin Spice',1,'Exótico té negro con una mágica mezcla','',46.00,1,0),(7,'Meiga Frappe',1,'Delicioso y dulce caramelo café en frappe','',59.00,1,0),(8,'Strega Frappe',1,'Exquisita bebida de chocolate menta en frappe','',59.00,1,0),(9,'Bruja de las nieves Frappe',1,'Latte positano de coco en frappe','',59.00,1,0),(10,'Befana Frappe',1,'Exquisito y elegante mocka blanco en frappe','',59.00,1,0),(11,'Bruja del Oeste',1,'Smothie de té verde','',59.00,1,0),(12,'Bruja del Norte',1,'Smothie de yoghurt sabor fresa o zarzamora','',59.00,1,0),(13,'Fairy Wings',1,'Smothie de raíz de taro, energizante natural','',59.00,1,0),(14,'Llama de Aradia',1,'Expreso con 1 bola de helado de sabor vainilla','',59.00,1,0),(15,'Moonlight Frappe',1,'Pedacitos de chocolate oscuro con finos granitos de café organico','',59.00,1,0),(16,'Pixie Berry',1,'Smothie de fresa, zarzamora o frambuesa con un expresso, crema batida y un toque de canela','',59.00,1,0),(17,'Hocus Pocus',1,'Smothie de algodón de azúcar','',59.00,1,0),(18,'Abracadabra',1,'Smothie de chicle','',59.00,1,0),(19,'Mágica Sorpresa',1,'Deliciosos smothie sabor mantequilla y pastel muy festivo','',59.00,1,0),(20,'Poción de las 3 Gracias',2,'Té verde con un suave sabor floral y un espectaculo visual','',82.00,1,0),(21,'Poción de los Amantes',2,'Té verde y aromático jazmín blanco y un lirio','',82.00,1,0),(22,'Poción de Afrodita',2,'Té verde con un deslumbrante clavel rojo','',82.00,1,0),(23,'Poción de Medea',2,'Enigmática flor que cubre una perla de téverde','',82.00,1,0),(24,'María Sahina',2,'Infusión herbal, relajante y anti estrés a base de azhar, pasiflora y mejorana','',82.00,1,0),(25,'Paraiso Exotico',3,'Deliciosa infusión frutal mezcla de hojuelas de mango','',50.00,1,0),(26,'Paraiso Exotico Frappe',3,'Deliciosa infusión frutal mezcla hojuelas de mango frappe','',55.00,1,0),(27,'Frutas de la Pasión',3,'Compuesta por románticos frutos rojos, con una mezcla de manzana deshidratada y jamaica','',50.00,1,0),(28,'Frutas de la Pasión Frappe',3,'Compuesta por romanticos frutos rojos frappe','',55.00,1,0),(29,'Fresa Kiwi',3,'De tonos rosados con trocitos de fresa','',50.00,1,0),(30,'Fresa Kiwi Frappe',3,'De tonos rosados con trocitos de fresa frappe','',55.00,1,0),(31,'Manzana Encantada',3,'Mezcla de manzana, canela, roolbos, vainilla y almendras','',50.00,1,0),(32,'Manzana Encantada Frappe',3,'Mezcla de manzana, canela, roolbos, vainilla y almendras frappe','',55.00,1,0),(33,'Goblin Spirit',3,'Tradicional sabor de ponche invernal con trocitos de guayaba, tejocote y manzana','',50.00,1,0),(34,'Goblin Spirit Frappe',3,'Tradicional sabor de ponche invernal Frappe','',55.00,1,0),(35,'Citric Summer',3,'Mezcla de sabores frutales con acentos del sol de verano rico en vitamina C','',50.00,1,0),(36,'Citric Summer Frappe',3,'Mezcla de sabores frutales con acentos del sol de verano frappe','',55.00,1,0),(37,'Omas Garden',3,'Deliciosa mezcla de moras, fresa, frambuesa y ruibarba','',50.00,1,0),(38,'Omas Garden Frappe',3,'Deliciosa mezcla de moras, fresa, frambuesa y ruibarba frappe','',55.00,1,0),(39,'Jazmín Fairy',4,'Mágico y antioxidante natural a base de jazmín','',35.00,1,0),(40,'Jazmín Fairy Frappe',4,'Mágico y antioxidante natural a base de jazmín','',40.00,1,0),(41,'Duende Verde',4,'Fresca y energizante mezcla de hierbabuena con menta','',35.00,1,0),(42,'Duende Verde Frappe',4,'Fresca y energizante mezcla de hierbabuena con menta frappe','',40.00,1,0),(43,'La Bruja de Tesalia',4,'Experimenta el mágico sabor de nuestr filtro amoroso de lavanda','',35.00,1,0),(44,'La Bruja de Tesalia Frappe',4,'Té herbal para la tranquilidad frappe','',40.00,1,0),(45,'Las Vestales Té',4,'Delicioso té frutal a base de durazno y gengibre','',35.00,1,0),(46,'Las Vestales Té Frappe',4,'Delicioso té frutal a base de durazno y gengibre frappe','',40.00,1,0),(47,'Cáliz de Fuego',4,'Té de frambuesa','',35.00,1,0),(48,'Cáliz de Fuego Frappe',4,'Té de Frambuesa Frappe','',40.00,1,0),(49,'Manzanilla Orgánico',4,'Te de Manzanilla','',35.00,1,0),(50,'Manzanilla Organico Frappe',4,'Te de Manzanilla frappe','',40.00,1,0),(51,'Gato Negro',5,'-','',50.00,1,0),(52,'Gato Negro Frappe',5,'--','',55.00,1,0),(53,'Lechuza Chai',5,'---','',50.00,1,0),(54,'Lechuza Chai Frappe',5,'----','',55.00,1,0),(55,'Dragón Chai',5,'-----','',50.00,1,0),(56,'Dragón Chai Frappe',5,'------','',55.00,1,0),(57,'Raven Chai',5,'||','',50.00,1,0),(58,'Raven Chai Frappe',5,'|||','',55.00,1,0),(59,'Toad Chai',5,'||||','',50.00,1,0),(60,'Toad Chai Frappe',5,'|||||','',55.00,1,0),(61,'Americano',6,'','',29.00,1,0),(62,'Americano Caramel',6,'','',35.00,1,0),(63,'Capuchino',6,'','',35.00,1,0),(64,'Capuchino con sabor',6,'Cajeta, irlandes, avellana, almendra, rompope, vainilla francesa, caramelo, inglés','',43.00,1,0),(65,'Chocolate',6,'','',33.00,1,0),(66,'Chocolate Blanco',6,'','',43.00,1,0),(67,'Chocolate Cookies & Cream',6,'','',43.00,1,0),(68,'Express',6,'','',29.00,1,0),(69,'Express Doble',6,'','',41.00,1,0),(70,'Machiatto',6,'','',32.00,1,0),(71,'Latte',6,'','',35.00,1,0),(72,'Vienes',6,'','',41.00,1,0),(73,'Cubano Express',6,'Con azúcar mascabado','',29.00,1,0),(74,'Steamer',6,'Bebida a base de leche mezclada con el sabor de tu elección','',41.00,1,0),(75,'Leche light o Deslactosada',6,'','',3.00,1,0),(76,'Carga extra',6,'','',10.00,1,0),(77,'Frappe',7,'Mocha, café, nuez, cookies&cream, caramelo, chocolate blanco, cholocate amargo','',53.00,1,0),(78,'Smoothie',7,'Maracuyá, kahlúa, kiwi, mango, sandia, piña colada, fresa, melón, durazno, cereza, mandarina, limón, frambuesa, tropical','',53.00,1,0),(79,'Soda Italiana',7,'Maracuyá, kahlúa, kiwi, mango, sandia, piña colada, fresa, melón, durazno, cereza, mandarina, limón, frambuesa, tropical','',44.00,1,0),(80,'Malteada',7,'Con bolas de helado de fresa, chocolate o vainilla','',58.00,1,0),(81,'Naranjada',7,'','',41.00,1,0),(82,'Limonada',7,'','',41.00,1,0),(83,'Chamoyada',7,'','',53.00,1,0),(84,'Refresco',7,'','',26.00,1,0),(85,'Agua Embotellada',7,'','',18.00,1,0),(86,'Refresco Light, Cherry y otros',7,'','',26.00,1,0),(87,'Pasteleria Mágica',8,'Una amplia variedad de novedosos sabores','',53.00,0,1),(88,'Galletas Runas de las Brujas',8,'Galleta de nuez con chocolate, decoradas con una runa mágica','',29.00,0,1),(89,'Galletas Sol y Luna',8,'Garabato, polvorón y nuez','',42.00,0,1),(90,'Copa de Helado Doble',8,'','',41.00,0,1),(91,'Copa de Helado Triple',8,'','',47.00,0,1),(92,'Muffin',8,'','',29.00,0,1),(93,'Brownie',8,'','',47.00,0,1),(94,'Brownie con helado',8,'','',57.00,0,1),(95,'Salem Cupcakes',8,'','',37.00,0,1),(96,'Chessecake',8,'Zarzamora, chocolate o nuez con hojaldre','',53.00,0,1),(97,'Aquelarre',9,'Pechuga de pollo, papa, zanahoria, chicharo, manzana, crema, mayonesa y apio','',94.00,0,1),(98,'Todos los Santos',9,'Jamón de pavo, fajitas de pollo, queso gouda, queso panela, lechuga, espinaca, aguacate y crema','',94.00,0,1),(99,'Corazón de Avalon',9,'Mix de lechugas, cerezas, arándanos, manzana, almendras con aderezo de miel con zarzamora','',94.00,0,1),(100,'Calypso',9,'Atún, lechuga, papa, zanahoria, jitomate, aguacate y aceitunas con el aderezo de tu elección','',88.00,0,1),(101,'Hechizo de Luna',9,'Mix de lechugas, duraznos en almibar, queso panela, nuez, pera, y aderezo césar','',88.00,0,1),(102,'Atún',10,'Atún, mayonesa, elote, lechuga, jitomate y aguacate','',70.00,0,1),(103,'Jamón de Pavo',10,'Jamón de pavo, queso gouda, lechuga, jitomate, aguacate','',70.00,0,1),(104,'Tres Quesos',10,'Quesos manchego, philadelphia y amarillo, lechuga, jitomate y aguacate','',70.00,0,1),(105,'Carnes Frías',10,'Jamón de pavo, salchicha, salami, queso goud, lechuga, jitomate y aguacate','',81.00,0,1),(106,'Las Nornas',11,'Queso gouda, philadelphia, panela, parMesano, lechuga, aguacate, jitomate y salsa de tomate con especias','',74.00,0,1),(107,'Morgan le Fay',11,'Jamón de pavo, queso gouda, philadelphia, parMesano, lechuga, aguacate, jitomate y salsa de chipotle','',74.00,0,1),(108,'Madame Mim',11,'Fakitas de pollo, queso gouda, parMesano, lechuga, jitomate, aguacate, granos de elote y aderezo césar','',85.00,0,1),(109,'Bahayaga',11,'','',85.00,0,1),(110,'Celtic Warrior',11,'Chuleta ahumada, queso gouda, lechuga, aguacate, jitomate y salsa bbq','',76.00,0,1),(111,'Dulces',12,'','',65.00,0,1),(112,'Saladas',12,'','',75.00,0,1),(113,'Rajas c/pollo',12,'','',75.00,0,1),(114,'Cuernos de Luna Nueva',13,'Jamón de pavo, queso gouda, lechuga, jitomate y aguacate','',52.00,0,1),(115,'Cuernos de Luna Menguante',13,'','',47.00,0,1),(116,'Sandwich',13,'Jamón de pavo, queso manchego, lechuga, jitomate y aguacate','',52.00,0,1),(117,'Sandwich 3 quesos',13,'Quesos gouda, philadelphia, amarillo, lechuga, jitomate y aguacate','',52.00,0,1),(118,'Sandwich Atún',13,'Atún, mayonesa, elote, lechuga, jitomate, aguacate','',60.00,0,1),(119,'Mandragoras Petit',13,'Snack de salchichas con salsa de cilanro y queso parMesano','',47.00,0,1),(120,'Molletes',13,'','',43.00,0,1),(121,'Sincronizadas',13,'','',43.00,0,1),(122,'Bisquet de Luna Llena',13,'Queso philadelphia y mermelada de fresa','',47.00,0,1),(123,'Ingrediente extra',13,'','',10.00,0,1),(124,'La Salud y Prosperidad',14,'','',55.00,1,0),(125,'La Pasión y la Creatividad',14,'','',55.00,1,0),(126,'Fuerza y el Poder',14,'','',55.00,1,0),(127,'Amor y Armonia',14,'','',55.00,1,0),(128,'Expresión y Resonancia',14,'','',55.00,1,0),(129,'Imaginación e Instrspección',14,'','',55.00,1,0),(130,'Meditación y Sabiduria',14,'','',55.00,1,0),(131,'La Salud y Prosperidad Frío',14,'','',40.00,1,0),(132,'La pasión y la Creatividad Frí',14,'','',40.00,1,0),(133,'Fuerza y el Poder Frío',14,'','',40.00,1,0),(134,'Amor y Armonia Frío',14,'','',40.00,1,0),(135,'Expresión y Resonancia Frío',14,'','',40.00,1,0),(136,'Imaginación e Instrspección Fr',14,'','',40.00,1,0),(137,'Meditación y Sabiduria Frío',14,'','',40.00,1,0);
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ticket`
--

DROP TABLE IF EXISTS `Ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ticket` (
  `idTicket` int(24) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime NOT NULL,
  `Cliente` int(12) DEFAULT NULL,
  `Mesa` int(4) DEFAULT NULL,
  `Empleado` int(12) DEFAULT NULL,
  `Comision` decimal(4,2) NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `FormaPago` varchar(25) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`idTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ticket`
--

LOCK TABLES `Ticket` WRITE;
/*!40000 ALTER TABLE `Ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ticket` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-01 18:10:30
