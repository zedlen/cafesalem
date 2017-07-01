/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : caffeesalem

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-01 13:14:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idCategoria` int(6) NOT NULL DEFAULT '0',
  `Nombre` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `Index_Categoria` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Especialidades', 'Bebidas tipo caliente de las especialidades de Cafeteria Saleen');
INSERT INTO `categoria` VALUES ('2', 'Pociones', '----');
INSERT INTO `categoria` VALUES ('3', 'Tizanas Calientes', '-----');
INSERT INTO `categoria` VALUES ('4', 'Tés Mágicos', '------');
INSERT INTO `categoria` VALUES ('5', 'Nuestros Familiares', '-------');
INSERT INTO `categoria` VALUES ('6', 'Bebidas', '--------');
INSERT INTO `categoria` VALUES ('7', 'Bebidas Frías', '---------');
INSERT INTO `categoria` VALUES ('8', 'Postres', '----------');
INSERT INTO `categoria` VALUES ('9', 'Ensaladas', '||||');
INSERT INTO `categoria` VALUES ('10', 'Chapatas', '|||||');
INSERT INTO `categoria` VALUES ('11', 'Wraps', '||||||');
INSERT INTO `categoria` VALUES ('12', 'Crepas', '|||||||');
INSERT INTO `categoria` VALUES ('13', 'Otros', '---');
INSERT INTO `categoria` VALUES ('14', 'Chakras y tés', '--');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(8) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `ApellidoPaterno` varchar(30) NOT NULL,
  `ApellidoMaterno` varchar(30) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `Index_Cliente` (`idCliente`,`rfc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cliente
-- ----------------------------

-- ----------------------------
-- Table structure for detalleticket
-- ----------------------------
DROP TABLE IF EXISTS `detalleticket`;
CREATE TABLE `detalleticket` (
  `Ticket` int(24) DEFAULT NULL,
  `Producto` int(12) DEFAULT NULL,
  `Cantidad` int(4) NOT NULL,
  `Comentario` varchar(300) DEFAULT NULL,
  `Subtotal` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalleticket
-- ----------------------------
INSERT INTO `detalleticket` VALUES ('1', '5', '5', null, '230.00');
INSERT INTO `detalleticket` VALUES ('1', '87', '2', null, '106.00');
INSERT INTO `detalleticket` VALUES ('1', '29', '6', null, '300.00');
INSERT INTO `detalleticket` VALUES ('1', '14', '1', null, '59.00');
INSERT INTO `detalleticket` VALUES ('2', '1', '2', null, '92.00');
INSERT INTO `detalleticket` VALUES ('2', '11', '3', null, '177.00');
INSERT INTO `detalleticket` VALUES ('2', '30', '3', null, '165.00');
INSERT INTO `detalleticket` VALUES ('2', '19', '3', null, '177.00');
INSERT INTO `detalleticket` VALUES ('4', '7', '1', null, '59.00');
INSERT INTO `detalleticket` VALUES ('5', '5', '1', null, '46.00');
INSERT INTO `detalleticket` VALUES ('6', '39', '2', null, '70.00');
INSERT INTO `detalleticket` VALUES ('6', '102', '3', null, '210.00');
INSERT INTO `detalleticket` VALUES ('5', '43', '3', null, '105.00');
INSERT INTO `detalleticket` VALUES ('5', '104', '1', null, '70.00');
INSERT INTO `detalleticket` VALUES ('7', '77', '4', null, '212.00');
INSERT INTO `detalleticket` VALUES ('13', '45', '1', null, '35.00');
INSERT INTO `detalleticket` VALUES ('13', '67', '1', null, '43.00');
INSERT INTO `detalleticket` VALUES ('13', '61', '1', null, '29.00');
INSERT INTO `detalleticket` VALUES ('13', '88', '1', null, '29.00');
INSERT INTO `detalleticket` VALUES ('13', '111', '1', null, '65.00');
INSERT INTO `detalleticket` VALUES ('14', '18', '2', null, '118.00');
INSERT INTO `detalleticket` VALUES ('14', '85', '20', null, '360.00');

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES ('1', 'Juanito', 'Lopez', 'Perez', 'ARRE930103HDFLRS02', '19', 'M', 'Aqui', '1');
INSERT INTO `empleado` VALUES ('2', 'Mario', 'Alberto', '2', 'LOAM970809HDFRT09', '18', 'M', '---', '1');

-- ----------------------------
-- Table structure for mesa
-- ----------------------------
DROP TABLE IF EXISTS `mesa`;
CREATE TABLE `mesa` (
  `idMesa` int(4) NOT NULL AUTO_INCREMENT,
  `Tipo` int(4) NOT NULL DEFAULT '1',
  `Descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idMesa`),
  UNIQUE KEY `Index_Mesa` (`idMesa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesa
-- ----------------------------
INSERT INTO `mesa` VALUES ('1', '1', '');
INSERT INTO `mesa` VALUES ('2', '1', '');
INSERT INTO `mesa` VALUES ('3', '1', '');
INSERT INTO `mesa` VALUES ('4', '1', '');
INSERT INTO `mesa` VALUES ('5', '1', '');
INSERT INTO `mesa` VALUES ('6', '1', '');
INSERT INTO `mesa` VALUES ('7', '1', '');
INSERT INTO `mesa` VALUES ('8', '1', '');
INSERT INTO `mesa` VALUES ('9', '1', '');
INSERT INTO `mesa` VALUES ('10', '1', '');

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
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
  CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('1', 'Meiga', '1', 'Delicioso y dulce caramelo café', '', '46.00', '1', '0');
INSERT INTO `producto` VALUES ('2', 'Strega', '1', 'Exquisita bebida de chocolate menta', '', '46.00', '1', '0');
INSERT INTO `producto` VALUES ('3', 'Bruja de las Nieves', '1', 'Latte positano de coco', '', '46.00', '1', '0');
INSERT INTO `producto` VALUES ('4', 'Befana', '1', 'Exquisito y elegante mocka blanco', '', '46.00', '1', '0');
INSERT INTO `producto` VALUES ('5', 'Elfo Negro', '1', 'Especiado té negro latte mezclado con delicioso sabor canela', '', '46.00', '1', '0');
INSERT INTO `producto` VALUES ('6', 'Pumpkin Spice', '1', 'Exótico té negro con una mágica mezcla', '', '46.00', '1', '0');
INSERT INTO `producto` VALUES ('7', 'Meiga Frappe', '1', 'Delicioso y dulce caramelo café en frappe', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('8', 'Strega Frappe', '1', 'Exquisita bebida de chocolate menta en frappe', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('9', 'Bruja de las nieves Frappe', '1', 'Latte positano de coco en frappe', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('10', 'Befana Frappe', '1', 'Exquisito y elegante mocka blanco en frappe', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('11', 'Bruja del Oeste', '1', 'Smothie de té verde', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('12', 'Bruja del Norte', '1', 'Smothie de yoghurt sabor fresa o zarzamora', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('13', 'Fairy Wings', '1', 'Smothie de raíz de taro, energizante natural', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('14', 'Llama de Aradia', '1', 'Expreso con 1 bola de helado de sabor vainilla', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('15', 'Moonlight Frappe', '1', 'Pedacitos de chocolate oscuro con finos granitos de café organico', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('16', 'Pixie Berry', '1', 'Smothie de fresa, zarzamora o frambuesa con un expresso, crema batida y un toque de canela', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('17', 'Hocus Pocus', '1', 'Smothie de algodón de azúcar', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('18', 'Abracadabra', '1', 'Smothie de chicle', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('19', 'Mágica Sorpresa', '1', 'Deliciosos smothie sabor mantequilla y pastel muy festivo', '', '59.00', '1', '0');
INSERT INTO `producto` VALUES ('20', 'Poción de las 3 Gracias', '2', 'Té verde con un suave sabor floral y un espectaculo visual', '', '82.00', '1', '0');
INSERT INTO `producto` VALUES ('21', 'Poción de los Amantes', '2', 'Té verde y aromático jazmín blanco y un lirio', '', '82.00', '1', '0');
INSERT INTO `producto` VALUES ('22', 'Poción de Afrodita', '2', 'Té verde con un deslumbrante clavel rojo', '', '82.00', '1', '0');
INSERT INTO `producto` VALUES ('23', 'Poción de Medea', '2', 'Enigmática flor que cubre una perla de téverde', '', '82.00', '1', '0');
INSERT INTO `producto` VALUES ('24', 'María Sahina', '2', 'Infusión herbal, relajante y anti estrés a base de azhar, pasiflora y mejorana', '', '82.00', '1', '0');
INSERT INTO `producto` VALUES ('25', 'Paraiso Exotico', '3', 'Deliciosa infusión frutal mezcla de hojuelas de mango', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('26', 'Paraiso Exotico Frappe', '3', 'Deliciosa infusión frutal mezcla hojuelas de mango frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('27', 'Frutas de la Pasión', '3', 'Compuesta por románticos frutos rojos, con una mezcla de manzana deshidratada y jamaica', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('28', 'Frutas de la Pasión Frappe', '3', 'Compuesta por romanticos frutos rojos frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('29', 'Fresa Kiwi', '3', 'De tonos rosados con trocitos de fresa', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('30', 'Fresa Kiwi Frappe', '3', 'De tonos rosados con trocitos de fresa frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('31', 'Manzana Encantada', '3', 'Mezcla de manzana, canela, roolbos, vainilla y almendras', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('32', 'Manzana Encantada Frappe', '3', 'Mezcla de manzana, canela, roolbos, vainilla y almendras frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('33', 'Goblin Spirit', '3', 'Tradicional sabor de ponche invernal con trocitos de guayaba, tejocote y manzana', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('34', 'Goblin Spirit Frappe', '3', 'Tradicional sabor de ponche invernal Frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('35', 'Citric Summer', '3', 'Mezcla de sabores frutales con acentos del sol de verano rico en vitamina C', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('36', 'Citric Summer Frappe', '3', 'Mezcla de sabores frutales con acentos del sol de verano frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('37', 'Omas Garden', '3', 'Deliciosa mezcla de moras, fresa, frambuesa y ruibarba', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('38', 'Omas Garden Frappe', '3', 'Deliciosa mezcla de moras, fresa, frambuesa y ruibarba frappe', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('39', 'Jazmín Fairy', '4', 'Mágico y antioxidante natural a base de jazmín', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('40', 'Jazmín Fairy Frappe', '4', 'Mágico y antioxidante natural a base de jazmín', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('41', 'Duende Verde', '4', 'Fresca y energizante mezcla de hierbabuena con menta', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('42', 'Duende Verde Frappe', '4', 'Fresca y energizante mezcla de hierbabuena con menta frappe', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('43', 'La Bruja de Tesalia', '4', 'Experimenta el mágico sabor de nuestr filtro amoroso de lavanda', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('44', 'La Bruja de Tesalia Frappe', '4', 'Té herbal para la tranquilidad frappe', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('45', 'Las Vestales Té', '4', 'Delicioso té frutal a base de durazno y gengibre', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('46', 'Las Vestales Té Frappe', '4', 'Delicioso té frutal a base de durazno y gengibre frappe', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('47', 'Cáliz de Fuego', '4', 'Té de frambuesa', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('48', 'Cáliz de Fuego Frappe', '4', 'Té de Frambuesa Frappe', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('49', 'Manzanilla Orgánico', '4', 'Te de Manzanilla', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('50', 'Manzanilla Organico Frappe', '4', 'Te de Manzanilla frappe', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('51', 'Gato Negro', '5', '-', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('52', 'Gato Negro Frappe', '5', '--', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('53', 'Lechuza Chai', '5', '---', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('54', 'Lechuza Chai Frappe', '5', '----', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('55', 'Dragón Chai', '5', '-----', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('56', 'Dragón Chai Frappe', '5', '------', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('57', 'Raven Chai', '5', '||', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('58', 'Raven Chai Frappe', '5', '|||', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('59', 'Toad Chai', '5', '||||', '', '50.00', '1', '0');
INSERT INTO `producto` VALUES ('60', 'Toad Chai Frappe', '5', '|||||', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('61', 'Americano', '6', '', '', '29.00', '1', '0');
INSERT INTO `producto` VALUES ('62', 'Americano Caramel', '6', '', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('63', 'Capuchino', '6', '', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('64', 'Capuchino con sabor', '6', 'Cajeta, irlandes, avellana, almendra, rompope, vainilla francesa, caramelo, inglés', '', '43.00', '1', '0');
INSERT INTO `producto` VALUES ('65', 'Chocolate', '6', '', '', '33.00', '1', '0');
INSERT INTO `producto` VALUES ('66', 'Chocolate Blanco', '6', '', '', '43.00', '1', '0');
INSERT INTO `producto` VALUES ('67', 'Chocolate Cookies & Cream', '6', '', '', '43.00', '1', '0');
INSERT INTO `producto` VALUES ('68', 'Express', '6', '', '', '29.00', '1', '0');
INSERT INTO `producto` VALUES ('69', 'Express Doble', '6', '', '', '41.00', '1', '0');
INSERT INTO `producto` VALUES ('70', 'Machiatto', '6', '', '', '32.00', '1', '0');
INSERT INTO `producto` VALUES ('71', 'Latte', '6', '', '', '35.00', '1', '0');
INSERT INTO `producto` VALUES ('72', 'Vienes', '6', '', '', '41.00', '1', '0');
INSERT INTO `producto` VALUES ('73', 'Cubano Express', '6', 'Con azúcar mascabado', '', '29.00', '1', '0');
INSERT INTO `producto` VALUES ('74', 'Steamer', '6', 'Bebida a base de leche mezclada con el sabor de tu elección', '', '41.00', '1', '0');
INSERT INTO `producto` VALUES ('75', 'Leche light o Deslactosada', '6', '', '', '3.00', '1', '0');
INSERT INTO `producto` VALUES ('76', 'Carga extra', '6', '', '', '10.00', '1', '0');
INSERT INTO `producto` VALUES ('77', 'Frappe', '7', 'Mocha, café, nuez, cookies&cream, caramelo, chocolate blanco, cholocate amargo', '', '53.00', '1', '0');
INSERT INTO `producto` VALUES ('78', 'Smoothie', '7', 'Maracuyá, kahlúa, kiwi, mango, sandia, piña colada, fresa, melón, durazno, cereza, mandarina, limón, frambuesa, tropical', '', '53.00', '1', '0');
INSERT INTO `producto` VALUES ('79', 'Soda Italiana', '7', 'Maracuyá, kahlúa, kiwi, mango, sandia, piña colada, fresa, melón, durazno, cereza, mandarina, limón, frambuesa, tropical', '', '44.00', '1', '0');
INSERT INTO `producto` VALUES ('80', 'Malteada', '7', 'Con bolas de helado de fresa, chocolate o vainilla', '', '58.00', '1', '0');
INSERT INTO `producto` VALUES ('81', 'Naranjada', '7', '', '', '41.00', '1', '0');
INSERT INTO `producto` VALUES ('82', 'Limonada', '7', '', '', '41.00', '1', '0');
INSERT INTO `producto` VALUES ('83', 'Chamoyada', '7', '', '', '53.00', '1', '0');
INSERT INTO `producto` VALUES ('84', 'Refresco', '7', '', '', '26.00', '1', '0');
INSERT INTO `producto` VALUES ('85', 'Agua Embotellada', '7', '', '', '18.00', '1', '0');
INSERT INTO `producto` VALUES ('86', 'Refresco Light, Cherry y otros', '7', '', '', '26.00', '1', '0');
INSERT INTO `producto` VALUES ('87', 'Pasteleria Mágica', '8', 'Una amplia variedad de novedosos sabores', '', '53.00', '0', '1');
INSERT INTO `producto` VALUES ('88', 'Galletas Runas de las Brujas', '8', 'Galleta de nuez con chocolate, decoradas con una runa mágica', '', '29.00', '0', '1');
INSERT INTO `producto` VALUES ('89', 'Galletas Sol y Luna', '8', 'Garabato, polvorón y nuez', '', '42.00', '0', '1');
INSERT INTO `producto` VALUES ('90', 'Copa de Helado Doble', '8', '', '', '41.00', '0', '1');
INSERT INTO `producto` VALUES ('91', 'Copa de Helado Triple', '8', '', '', '47.00', '0', '1');
INSERT INTO `producto` VALUES ('92', 'Muffin', '8', '', '', '29.00', '0', '1');
INSERT INTO `producto` VALUES ('93', 'Brownie', '8', '', '', '47.00', '0', '1');
INSERT INTO `producto` VALUES ('94', 'Brownie con helado', '8', '', '', '57.00', '0', '1');
INSERT INTO `producto` VALUES ('95', 'Salem Cupcakes', '8', '', '', '37.00', '0', '1');
INSERT INTO `producto` VALUES ('96', 'Chessecake', '8', 'Zarzamora, chocolate o nuez con hojaldre', '', '53.00', '0', '1');
INSERT INTO `producto` VALUES ('97', 'Aquelarre', '9', 'Pechuga de pollo, papa, zanahoria, chicharo, manzana, crema, mayonesa y apio', '', '94.00', '0', '1');
INSERT INTO `producto` VALUES ('98', 'Todos los Santos', '9', 'Jamón de pavo, fajitas de pollo, queso gouda, queso panela, lechuga, espinaca, aguacate y crema', '', '94.00', '0', '1');
INSERT INTO `producto` VALUES ('99', 'Corazón de Avalon', '9', 'Mix de lechugas, cerezas, arándanos, manzana, almendras con aderezo de miel con zarzamora', '', '94.00', '0', '1');
INSERT INTO `producto` VALUES ('100', 'Calypso', '9', 'Atún, lechuga, papa, zanahoria, jitomate, aguacate y aceitunas con el aderezo de tu elección', '', '88.00', '0', '1');
INSERT INTO `producto` VALUES ('101', 'Hechizo de Luna', '9', 'Mix de lechugas, duraznos en almibar, queso panela, nuez, pera, y aderezo césar', '', '88.00', '0', '1');
INSERT INTO `producto` VALUES ('102', 'Atún', '10', 'Atún, mayonesa, elote, lechuga, jitomate y aguacate', '', '70.00', '0', '1');
INSERT INTO `producto` VALUES ('103', 'Jamón de Pavo', '10', 'Jamón de pavo, queso gouda, lechuga, jitomate, aguacate', '', '70.00', '0', '1');
INSERT INTO `producto` VALUES ('104', 'Tres Quesos', '10', 'Quesos manchego, philadelphia y amarillo, lechuga, jitomate y aguacate', '', '70.00', '0', '1');
INSERT INTO `producto` VALUES ('105', 'Carnes Frías', '10', 'Jamón de pavo, salchicha, salami, queso goud, lechuga, jitomate y aguacate', '', '81.00', '0', '1');
INSERT INTO `producto` VALUES ('106', 'Las Nornas', '11', 'Queso gouda, philadelphia, panela, parmesano, lechuga, aguacate, jitomate y salsa de tomate con especias', '', '74.00', '0', '1');
INSERT INTO `producto` VALUES ('107', 'Morgan le Fay', '11', 'Jamón de pavo, queso gouda, philadelphia, parmesano, lechuga, aguacate, jitomate y salsa de chipotle', '', '74.00', '0', '1');
INSERT INTO `producto` VALUES ('108', 'Madame Mim', '11', 'Fakitas de pollo, queso gouda, parmesano, lechuga, jitomate, aguacate, granos de elote y aderezo césar', '', '85.00', '0', '1');
INSERT INTO `producto` VALUES ('109', 'Bahayaga', '11', '', '', '85.00', '0', '1');
INSERT INTO `producto` VALUES ('110', 'Celtic Warrior', '11', 'Chuleta ahumada, queso gouda, lechuga, aguacate, jitomate y salsa bbq', '', '76.00', '0', '1');
INSERT INTO `producto` VALUES ('111', 'Dulces', '12', '', '', '65.00', '0', '1');
INSERT INTO `producto` VALUES ('112', 'Saladas', '12', '', '', '75.00', '0', '1');
INSERT INTO `producto` VALUES ('113', 'Rajas c/pollo', '12', '', '', '75.00', '0', '1');
INSERT INTO `producto` VALUES ('114', 'Cuernos de Luna Nueva', '13', 'Jamón de pavo, queso gouda, lechuga, jitomate y aguacate', '', '52.00', '0', '1');
INSERT INTO `producto` VALUES ('115', 'Cuernos de Luna Menguante', '13', '', '', '47.00', '0', '1');
INSERT INTO `producto` VALUES ('116', 'Sandwich', '13', 'Jamón de pavo, queso manchego, lechuga, jitomate y aguacate', '', '52.00', '0', '1');
INSERT INTO `producto` VALUES ('117', 'Sandwich 3 quesos', '13', 'Quesos gouda, philadelphia, amarillo, lechuga, jitomate y aguacate', '', '52.00', '0', '1');
INSERT INTO `producto` VALUES ('118', 'Sandwich Atún', '13', 'Atún, mayonesa, elote, lechuga, jitomate, aguacate', '', '60.00', '0', '1');
INSERT INTO `producto` VALUES ('119', 'Mandragoras Petit', '13', 'Snack de salchichas con salsa de cilanro y queso parmesano', '', '47.00', '0', '1');
INSERT INTO `producto` VALUES ('120', 'Molletes', '13', '', '', '43.00', '0', '1');
INSERT INTO `producto` VALUES ('121', 'Sincronizadas', '13', '', '', '43.00', '0', '1');
INSERT INTO `producto` VALUES ('122', 'Bisquet de Luna Llena', '13', 'Queso philadelphia y mermelada de fresa', '', '47.00', '0', '1');
INSERT INTO `producto` VALUES ('123', 'Ingrediente extra', '13', '', '', '10.00', '0', '1');
INSERT INTO `producto` VALUES ('124', 'La Salud y Prosperidad', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('125', 'La Pasión y la Creatividad', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('126', 'Fuerza y el Poder', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('127', 'Amor y Armonia', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('128', 'Expresión y Resonancia', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('129', 'Imaginación e Instrspección', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('130', 'Meditación y Sabiduria', '14', '', '', '55.00', '1', '0');
INSERT INTO `producto` VALUES ('131', 'La Salud y Prosperidad Frío', '14', '', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('132', 'La pasión y la Creatividad Frí', '14', '', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('133', 'Fuerza y el Poder Frío', '14', '', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('134', 'Amor y Armonia Frío', '14', '', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('135', 'Expresión y Resonancia Frío', '14', '', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('136', 'Imaginación e Instrspección Fr', '14', '', '', '40.00', '1', '0');
INSERT INTO `producto` VALUES ('137', 'Meditación y Sabiduria Frío', '14', '', '', '40.00', '1', '0');

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket` VALUES ('1', '2017-06-27 20:55:17', '1', '2', '1', '0.00', '695.00', 'EFECTIVO', '0');
INSERT INTO `ticket` VALUES ('2', '2017-06-27 20:55:36', '1', '1', '1', '0.00', '611.00', 'EFECTIVO', '0');
INSERT INTO `ticket` VALUES ('4', '2017-06-28 00:09:22', '1', '2', '1', '0.00', '59.00', 'EFECTIVO', '0');
INSERT INTO `ticket` VALUES ('5', '2017-06-28 00:09:47', '1', '2', '1', '0.00', '221.00', 'EFECTIVO', '0');
INSERT INTO `ticket` VALUES ('6', '2017-06-28 00:17:38', '1', '5', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('7', '2017-06-28 00:18:11', '1', '8', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('8', '2017-06-28 00:18:34', '1', '4', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('9', '2017-06-28 00:18:36', '1', '3', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('10', '2017-06-28 00:18:47', '1', '9', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('11', '2017-06-28 00:18:49', '1', '10', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('12', '2017-06-28 00:18:51', '1', '7', null, '0.00', '0.00', '', '1');
INSERT INTO `ticket` VALUES ('13', '2017-06-29 10:36:05', '1', '6', '1', '0.00', '201.00', 'EFECTIVO', '0');
INSERT INTO `ticket` VALUES ('14', '2017-06-29 23:59:14', '1', '1', '1', '0.00', '478.00', 'EFECTIVO', '0');
