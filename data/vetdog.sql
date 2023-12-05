-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'clientes'
-- 
-- ---

DROP TABLE IF EXISTS `clientes`;
		
CREATE TABLE `clientes` (
  `idCliente` INTEGER NOT NULL AUTO_INCREMENT,
  `nomCliente` VARCHAR(45) NULL DEFAULT NULL,
  `cni` VARCHAR(45) NULL DEFAULT NULL,
  `direccion` VARCHAR(150) NULL DEFAULT NULL,
  `telefono` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY (`cni`)
);

-- ---
-- Table 'consultas'
-- 
-- ---

DROP TABLE IF EXISTS `consultas`;
		
CREATE TABLE `consultas` (
  `idConsultas` INTEGER NOT NULL AUTO_INCREMENT,
  `fechaConsulta` DATE NULL DEFAULT NULL,
  `diagnostico` VARCHAR(150) NULL DEFAULT NULL,
  `tratamiento` VARCHAR(150) NULL DEFAULT NULL,
  `idVeterinario` INTEGER NOT NULL,
  `idMascota` INTEGER NOT NULL,
  `idUsuario` INTEGER NOT NULL,
  PRIMARY KEY (`idConsultas`)
);

-- ---
-- Table 'veterinarios'
-- 
-- ---

DROP TABLE IF EXISTS `veterinarios`;
		
CREATE TABLE `veterinarios` (
  `idVeterinario` INTEGER NOT NULL AUTO_INCREMENT,
  `nomVeterinario` VARCHAR(45) NULL DEFAULT NULL,
  `cni` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` INTEGER NULL DEFAULT NULL,
  `idEspecialidad` INTEGER NOT NULL,
  PRIMARY KEY (`idVeterinario`),
  UNIQUE KEY (`cni`)
);

-- ---
-- Table 'mascotas'
-- 
-- ---

DROP TABLE IF EXISTS `mascotas`;
		
CREATE TABLE `mascotas` (
  `idMascota` INTEGER NOT NULL AUTO_INCREMENT,
  `nomMascota` VARCHAR(45) NULL DEFAULT NULL,
  `servicio` VARCHAR(45) NULL DEFAULT NULL,
  `idTipo` INTEGER NOT NULL,
  `idRaza` INTEGER NOT NULL,
  `idCliente` INTEGER NOT NULL,
  PRIMARY KEY (`idMascota`)
);

-- ---
-- Table 'usuarios'
-- 
-- ---

DROP TABLE IF EXISTS `usuarios`;
		
CREATE TABLE `usuarios` (
  `idUsuario` INTEGER NOT NULL AUTO_INCREMENT,
  `alias` VARCHAR(45) NULL DEFAULT NULL,
  `clave` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
);

-- ---
-- Table 'roles'
-- 
-- ---

DROP TABLE IF EXISTS `roles`;
		
CREATE TABLE `roles` (
  `idRol` INTEGER NOT NULL AUTO_INCREMENT,
  `descripcion` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY (`descripcion`)
);

-- ---
-- Table 'permisos'
-- 
-- ---

DROP TABLE IF EXISTS `permisos`;
		
CREATE TABLE `permisos` (
  `idPermisos` INTEGER NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idPermisos`),
  UNIQUE KEY (`descripcion`)
);

-- ---
-- Table 'raza'
-- 
-- ---

DROP TABLE IF EXISTS `raza`;
		
CREATE TABLE `raza` (
  `idRaza` INTEGER NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idRaza`),
  UNIQUE KEY (`descripcion`)
);

-- ---
-- Table 'especialidad'
-- 
-- ---

DROP TABLE IF EXISTS `especialidad`;
		
CREATE TABLE `especialidad` (
  `idEspecialidad` INTEGER NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idEspecialidad`),
  UNIQUE KEY (`descripcion`)
);

-- ---
-- Table 'tipoMascota'
-- 
-- ---

DROP TABLE IF EXISTS `tipoMascota`;
		
CREATE TABLE `tipoMascota` (
  `idTipo` INTEGER NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipo`),
  UNIQUE KEY (`descripcion`)
);

-- ---
-- Table 'rolesPermisos'
-- 
-- ---

DROP TABLE IF EXISTS `rolesPermisos`;
		
CREATE TABLE `rolesPermisos` (
  `idPermisos` INTEGER NOT NULL,
  `idRol` INTEGER NOT NULL,
  PRIMARY KEY (`idPermisos`, `idRol`)
);

-- ---
-- Table 'usuarioRoles'
-- 
-- ---

DROP TABLE IF EXISTS `usuarioRoles`;
		
CREATE TABLE `usuarioRoles` (
  `idUsuario` INTEGER NOT NULL,
  `idRol` INTEGER NOT NULL,
  PRIMARY KEY (`idUsuario`, `idRol`)
);

-- ---
-- Table 'facturas'
-- 
-- ---

DROP TABLE IF EXISTS `facturas`;
		
CREATE TABLE `facturas` (
  `numero` INTEGER NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL DEFAULT NULL,
  `idUsuario` INTEGER NOT NULL,
  `idCliente` INTEGER NOT NULL,
  `idFormaPago` INTEGER NOT NULL,
  `anulada` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`numero`)
);

-- ---
-- Table 'formapago'
-- 
-- ---

DROP TABLE IF EXISTS `formapago`;
		
CREATE TABLE `formapago` (
  `idFormaPago` INTEGER NOT NULL AUTO_INCREMENT,
  `descripcion` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`idFormaPago`),
  UNIQUE KEY (`descripcion`)
);

-- ---
-- Table 'detallefacturas'
-- 
-- ---

DROP TABLE IF EXISTS `detallefacturas`;
		
CREATE TABLE `detallefacturas` (
  `numero` INTEGER NOT NULL,
  `idConsultas` INTEGER NOT NULL,
  `importe` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`numero`, `idConsultas`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `consultas` ADD FOREIGN KEY (idVeterinario) REFERENCES `veterinarios` (`idVeterinario`);
ALTER TABLE `consultas` ADD FOREIGN KEY (idMascota) REFERENCES `mascotas` (`idMascota`);
ALTER TABLE `consultas` ADD FOREIGN KEY (idUsuario) REFERENCES `usuarios` (`idUsuario`);
ALTER TABLE `veterinarios` ADD FOREIGN KEY (idEspecialidad) REFERENCES `especialidad` (`idEspecialidad`);
ALTER TABLE `mascotas` ADD FOREIGN KEY (idTipo) REFERENCES `tipoMascota` (`idTipo`);
ALTER TABLE `mascotas` ADD FOREIGN KEY (idRaza) REFERENCES `raza` (`idRaza`);
ALTER TABLE `mascotas` ADD FOREIGN KEY (idCliente) REFERENCES `clientes` (`idCliente`);
ALTER TABLE `rolesPermisos` ADD FOREIGN KEY (idPermisos) REFERENCES `permisos` (`idPermisos`);
ALTER TABLE `rolesPermisos` ADD FOREIGN KEY (idRol) REFERENCES `roles` (`idRol`);
ALTER TABLE `usuarioRoles` ADD FOREIGN KEY (idUsuario) REFERENCES `usuarios` (`idUsuario`);
ALTER TABLE `usuarioRoles` ADD FOREIGN KEY (idRol) REFERENCES `roles` (`idRol`);
ALTER TABLE `facturas` ADD FOREIGN KEY (idUsuario) REFERENCES `usuarios` (`idUsuario`);
ALTER TABLE `facturas` ADD FOREIGN KEY (idCliente) REFERENCES `clientes` (`idCliente`);
ALTER TABLE `facturas` ADD FOREIGN KEY (idFormaPago) REFERENCES `formapago` (`idFormaPago`);
ALTER TABLE `detallefacturas` ADD FOREIGN KEY (numero) REFERENCES `facturas` (`numero`);
ALTER TABLE `detallefacturas` ADD FOREIGN KEY (idConsultas) REFERENCES `consultas` (`idConsultas`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `clientes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `consultas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `veterinarios` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `mascotas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `usuarios` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `roles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `permisos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `raza` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `especialidad` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tipoMascota` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `rolesPermisos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `usuarioRoles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `facturas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `formapago` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `detallefacturas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `clientes` (`idCliente`,`nomCliente`,`cni`,`direccion`,`telefono`) VALUES
-- ('','','','','');
-- INSERT INTO `consultas` (`idConsultas`,`fechaConsulta`,`diagnostico`,`tratamiento`,`idVeterinario`,`idMascota`,`idUsuario`) VALUES
-- ('','','','','','','');
-- INSERT INTO `veterinarios` (`idVeterinario`,`nomVeterinario`,`cni`,`telefono`,`idEspecialidad`) VALUES
-- ('','','','','');
-- INSERT INTO `mascotas` (`idMascota`,`nomMascota`,`servicio`,`idTipo`,`idRaza`,`idCliente`) VALUES
-- ('','','','','','');
-- INSERT INTO `usuarios` (`idUsuario`,`alias`,`clave`) VALUES
-- ('','','');
-- INSERT INTO `roles` (`idRol`,`descripcion`) VALUES
-- ('','');
-- INSERT INTO `permisos` (`idPermisos`,`descripcion`) VALUES
-- ('','');
-- INSERT INTO `raza` (`idRaza`,`descripcion`) VALUES
-- ('','');
-- INSERT INTO `especialidad` (`idEspecialidad`,`descripcion`) VALUES
-- ('','');
-- INSERT INTO `tipoMascota` (`idTipo`,`descripcion`) VALUES
-- ('','');
-- INSERT INTO `rolesPermisos` (`idPermisos`,`idRol`) VALUES
-- ('','');
-- INSERT INTO `usuarioRoles` (`idUsuario`,`idRol`) VALUES
-- ('','');
-- INSERT INTO `facturas` (`numero`,`fecha`,`idUsuario`,`idCliente`,`idFormaPago`,`anulada`) VALUES
-- ('','','','','','');
-- INSERT INTO `formapago` (`idFormaPago`,`descripcion`) VALUES
-- ('','');
-- INSERT INTO `detallefacturas` (`numero`,`idConsultas`,`importe`) VALUES
-- ('','','');