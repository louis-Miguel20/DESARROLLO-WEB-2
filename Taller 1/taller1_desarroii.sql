-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2024 a las 16:48:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller1_desarroii`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID_autor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Nacionalidad` varchar(100) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Biografia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID_autor`, `Nombre`, `Nacionalidad`, `Fecha_nacimiento`, `Biografia`) VALUES
(1, 'Gabriel García Márquez', 'Colombiano', '1927-03-06', 'Ganador del Premio Nobel de Literatura en 1982.'),
(2, 'J.K. Rowling', 'Británica', '1965-07-31', 'Autora de la famosa serie de Harry Potter.'),
(3, 'Stephen King', 'Estadounidense', '1947-09-21', 'Conocido como el \"Rey del Terror\".'),
(4, 'Haruki Murakami', 'Japonés', '1949-01-12', 'Autor de numerosas obras de ficción y no ficción.'),
(5, 'Margaret Atwood', 'Canadiense', '1939-11-18', 'Conocida por su novela distópica \"El cuento de la criada\".'),
(6, 'J.R.R. Tolkien', 'Británico', '1892-01-03', 'Autor de \"El Señor de los Anillos\" y \"El Hobbit\".'),
(7, 'Agatha Christie', 'Británica', '1890-09-15', 'Famosa por sus novelas de misterio y detectives.'),
(8, 'Hermann Hesse', 'Alemán', '1877-07-02', 'Autor de \"El lobo estepario\" y \"Siddhartha\".'),
(9, 'Virginia Woolf', 'Británica', '1882-01-25', 'Figura destacada del modernismo literario.'),
(10, 'Ernest Hemingway', 'Estadounidense', '1899-07-21', 'Ganador del Premio Nobel de Literatura en 1954.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `ID_editorial` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `Año_fundacion` year(4) DEFAULT NULL,
  `Numero_publicaciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`ID_editorial`, `Nombre`, `Ubicacion`, `Año_fundacion`, `Numero_publicaciones`) VALUES
(1, 'Editorial X', 'Ciudad A', 1950, 1000),
(2, 'Editorial Y', 'Ciudad B', 1960, 1500),
(3, 'Editorial Z', 'Ciudad C', 1975, 1200),
(4, 'Editorial W', 'Ciudad D', 1985, 1800),
(5, 'Editorial V', 'Ciudad E', 1990, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `ID_genero` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Fecha_creacion` date DEFAULT NULL,
  `Popularidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`ID_genero`, `Nombre`, `Descripcion`, `Fecha_creacion`, `Popularidad`) VALUES
(1, 'Ficción', 'Novelas de ficción general', '1800-01-01', 5),
(2, 'Fantasía', 'Novelas de fantasía', '1850-01-01', 4),
(3, 'Misterio', 'Novelas de misterio y detectives', '1900-01-01', 3),
(4, 'Ciencia Ficción', 'Novelas de ciencia ficción', '1920-01-01', 3),
(5, 'Romance', 'Novelas románticas', '1800-01-01', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_libro` int(11) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Autor_ID` int(11) DEFAULT NULL,
  `Genero_ID` int(11) DEFAULT NULL,
  `Editorial_ID` int(11) DEFAULT NULL,
  `Fecha_publicacion` date DEFAULT NULL,
  `Numero_paginas` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_libro`, `Titulo`, `Autor_ID`, `Genero_ID`, `Editorial_ID`, `Fecha_publicacion`, `Numero_paginas`, `Precio`) VALUES
(1, 'Cien años de soledad', 1, 1, 1, '1967-05-30', 432, '25.99'),
(2, 'Harry Potter y la piedra filosofal', 2, 2, 2, '1997-06-26', 320, '19.99'),
(3, 'El resplandor', 3, 1, 3, '1977-01-28', 464, '22.50'),
(4, 'Norwegian Wood', 4, 1, 4, '1987-08-28', 296, '18.75'),
(5, 'El cuento de la criada', 5, 1, 5, '1985-01-01', 311, '21.99'),
(6, 'El Señor de los Anillos: La Comunidad del Anillo', 6, 2, 1, '1954-07-29', 527, '30.50'),
(7, 'Asesinato en el Orient Express', 7, 3, 2, '1934-01-01', 256, '16.99'),
(8, 'El lobo estepario', 8, 1, 3, '1927-10-01', 231, '19.99'),
(9, 'La señora Dalloway', 9, 1, 4, '1925-05-14', 194, '15.50'),
(10, 'Adiós a las armas', 10, 1, 5, '1929-09-27', 352, '20.75');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID_autor`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`ID_editorial`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`ID_genero`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_libro`),
  ADD KEY `Autor_ID` (`Autor_ID`),
  ADD KEY `Genero_ID` (`Genero_ID`),
  ADD KEY `Editorial_ID` (`Editorial_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `ID_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `ID_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Autor_ID`) REFERENCES `autores` (`ID_autor`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`Genero_ID`) REFERENCES `generos` (`ID_genero`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`Editorial_ID`) REFERENCES `editoriales` (`ID_editorial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
