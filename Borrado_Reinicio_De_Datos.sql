-- Desactivar las restricciones de claves foráneas temporalmente
SET FOREIGN_KEY_CHECKS = 0;

-- Eliminar restricciones de claves foráneas
ALTER TABLE `libros_prestados` DROP FOREIGN KEY `libros_prestados_ibfk_1`;
ALTER TABLE `libros_prestados` DROP FOREIGN KEY `libros_prestados_ibfk_2`;
ALTER TABLE `libros` DROP FOREIGN KEY `libros_ibfk_1`;
ALTER TABLE `alumnos` DROP FOREIGN KEY `alumnos_ibfk_1`;

-- Truncar las tablas
TRUNCATE TABLE `libros_prestados`;
TRUNCATE TABLE `libros`;
TRUNCATE TABLE `categoria`;
TRUNCATE TABLE `alumnos`;
TRUNCATE TABLE `carreras`;
TRUNCATE TABLE `personal`;

-- Insertar los datos iniciales
INSERT INTO `carreras` (`ID_Carrera`, `Carreras`) VALUES
(1, 'A'),
(2, 'B');

INSERT INTO `personal` (`ID_Usuario`, `usuario`, `password`, `nombre`) VALUES
(1, 'carmen@gmail.com', '12345', 'Carmen');

-- Restaurar restricciones de claves foráneas
ALTER TABLE `libros_prestados`
  ADD CONSTRAINT `libros_prestados_ibfk_1` FOREIGN KEY (`libro_ID`) REFERENCES `libros` (`ID_Libro`),
  ADD CONSTRAINT `libros_prestados_ibfk_2` FOREIGN KEY (`alumno_ID`) REFERENCES `alumnos` (`ID_Alumno`);

ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Categoria_ID`) REFERENCES `categoria` (`ID_Categoria`);

ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`Carrera_ID`) REFERENCES `carreras` (`ID_Carrera`);

-- Activar nuevamente las restricciones de claves foráneas
SET FOREIGN_KEY_CHECKS = 1;
