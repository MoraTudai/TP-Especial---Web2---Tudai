-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 03:02:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_categorie`, `nombre`) VALUES
(1, 'Pinturas'),
(2, 'Preparación'),
(3, 'Protección'),
(12, 'A la tiza'),
(20, 'agregada'),
(22, 'Escriba su nombre completo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `id_categorie_fk` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `size`, `color`, `price`, `id_categorie_fk`, `description`) VALUES
(47, 'Enduido', '4 Litros', 'Blanco', 1800, 2, 'Pintura de secado rápido. De acabado aterciopelado que embellece y confiere protección a los muros donde se aplica. Su fórmula contiene cargas inertes, bióxido de titanio y emulsión estireno acrílica.\r\nRendimiento: entre 10 a 12 m2/lt por mano.'),
(48, 'Enduido', '15 Litros', 'Blanco', 4000, 2, 'Pintura de secado rápido. De acabado aterciopelado que embellece y confiere protección a los muros donde se aplica. Su fórmula contiene cargas inertes, bióxido de titanio y emulsión estireno acrílica.\r\nRendimiento: entre 10 a 12 m2/lt por mano.'),
(49, 'A la cal', '1 Litro', 'Blanco', 800, 1, 'Pintura de secado rápido. De acabado aterciopelado que embellece y confiere protección a los muros donde se aplica. Su fórmula contiene cargas inertes, bióxido de titanio y emulsión estireno acrílica.\r\nRendimiento: entre 10 a 12 m2/lt por mano.'),
(50, 'A la cal', '4 Litros', 'Blanco', 3000, 1, 'Pintura de secado rápido. De acabado aterciopelado que embellece y confiere protección a los muros donde se aplica. Su fórmula contiene cargas inertes, bióxido de titanio y emulsión estireno acrílica.\r\nRendimiento: entre 10 a 12 m2/lt por mano.'),
(51, 'A la cal', '10 Litros', 'Blanco', 6500, 1, 'Pintura de secado rápido. De acabado aterciopelado que embellece y confiere protección a los muros donde se aplica. Su fórmula contiene cargas inertes, bióxido de titanio y emulsión estireno acrílica.\r\nRendimiento: entre 10 a 12 m2/lt por mano.'),
(58, 'modificado', 'modificado', 'modificado', 555, 2, NULL),
(59, 'Inserto', 'Inserto', 'Inserto', 666, 1, NULL),
(61, 'modificado', 'modificar', 'modifica', 555, 2, NULL),
(62, 'modificado', 'modificar', 'modifica', 555, 2, NULL),
(63, 'nuevo producto', 'nuevo', 'producto', 555, 2, NULL),
(65, 'pintura primera', 'pintura primera', 'productos primera', 555, 2, NULL),
(66, 'agregado', 'agregado', 'agregado', 555, 1, 'Pintura de secado rápido. Acabado aterciopelado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`) VALUES
(1, 'mora.cerimedo@gmail.com', '$2a$12$/7hIu.pOfLXA6x9x45Hh6eE.uBjez41K/.VwWiVFlQt1UBEsaWN3G');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_categoria_fk` (`id_categorie_fk`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_categorie_fk`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
