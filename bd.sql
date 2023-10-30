create database `bdpapeleria`;

use `bdpapeleria`;

CREATE TABLE `iniciosesion` (
  `id_inicio` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id_inicio`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `empleado` (
  `id_empleado` int(100) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(100) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `id_inicio` int(10) NOT NULL,
    PRIMARY KEY  (`id_empleado`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id_inicio) REFERENCES iniciosesion(id_inicio)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;