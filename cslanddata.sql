-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2020 a las 07:33:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cslanddata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `access`
--

CREATE TABLE `access` (
  `EventidE` tinyint(11) NOT NULL,
  `UseridU` tinyint(11) NOT NULL,
  `folio` tinyint(11) NOT NULL,
  `typeA` tinyint(1) NOT NULL,
  `cost` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist`
--

CREATE TABLE `artist` (
  `idA` tinyint(11) NOT NULL,
  `nameA` varchar(255) NOT NULL,
  `imgA` varchar(255) NOT NULL,
  `paisA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artist`
--

INSERT INTO `artist` (`idA`, `nameA`, `imgA`, `paisA`) VALUES
(1, 'BTS', 'bts-artist.jpg', 'Corea del sur'),
(2, 'Adele', 'adele-artist.jpg', 'Inglaterra'),
(3, 'Billie Eilish', 'billie-artist.jpg', 'Estados Unidos'),
(4, 'Sam Smith', 'sam-artist.jpg', 'Inglaterra'),
(5, 'Dua Lipa', 'dua-artist.jpg', 'Inglaterra'),
(6, 'Harry Styles', 'harry-artist.jpg', 'Inglaterra'),
(7, 'SIA', 'sia-artist.jpg', 'Australia'),
(8, 'Bruno Mars', 'bruno-artist.jpg', 'Estados Unidos'),
(9, 'Miley Cyrus', 'miley-artist.jpg', 'Estados Unidos'),
(10, 'Rosalía', 'rosalia-artist.jpg', 'España'),
(11, 'Ed Sheeran', 'ed-artist.jpg', 'Inglaterra'),
(12, 'Lady Gaga', 'lady-artist.jpg', 'Estados Unidos'),
(13, 'Rihanna', 'rihanna-artist.jpg', 'Barbados'),
(14, 'Beyoncé', 'beyoncé-artist.jpg', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carritoId` tinyint(11) NOT NULL,
  `productoID` tinyint(11) NOT NULL,
  `usuarioId` tinyint(11) NOT NULL,
  `costoProduct` float NOT NULL,
  `cantC` tinyint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carritoId`, `productoID`, `usuarioId`, `costoProduct`, `cantC`) VALUES
(25, 3, 32, 1300, 2),
(26, 6, 32, 900, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventassignament`
--

CREATE TABLE `eventassignament` (
  `ArtistidA` tinyint(11) NOT NULL,
  `EventidE` tinyint(11) NOT NULL,
  `folio` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventassignament`
--

INSERT INTO `eventassignament` (`ArtistidA`, `EventidE`, `folio`) VALUES
(1, 7, 127),
(2, 8, 127),
(3, 9, 127),
(4, 10, 127),
(5, 11, 127),
(6, 12, 127),
(9, 15, 127),
(10, 20, 127),
(11, 21, 127),
(12, 13, 127),
(12, 22, 127);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idE` tinyint(11) NOT NULL,
  `nameE` varchar(255) NOT NULL,
  `descE` varchar(255) NOT NULL,
  `dateE` date NOT NULL,
  `timeE` time NOT NULL,
  `imgE` varchar(255) NOT NULL,
  `imgEpurs` varchar(255) NOT NULL,
  `cost1` float NOT NULL,
  `cost2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idE`, `nameE`, `descE`, `dateE`, `timeE`, `imgE`, `imgEpurs`, `cost1`, `cost2`) VALUES
(7, 'BTS MAP OF THE SOUL ON:E', 'Map of the Soul ON: E son dos conciertos de pago por visión de BTS para promocionar su serie Map of the Soul, incluido su sexto mini álbum, \"Map of the Soul: Person\" y su cuarto álbum de estudio.', '2021-02-17', '19:56:00', 'BTS.jpg', '', 2200, 2200),
(8, 'ADELE LIVE IN NEW YORK CITY 2017', 'Live in New York City será un programa de una noche de Adele en el Radio City Music Hall , será dirigido por Beth McCarthy-Miller y Jimmy Fallon será el anfitrión', '2020-12-20', '20:00:00', 'Adele.jpg', '', 2200, 2200),
(9, 'Billie Eilish When We All Fall Asleep Tour', 'Es la tercera gira de conciertos de la artista estadounidense Billie Eilish, realizada con el objetivo de promocionar su álbum de estudio debut When We All Fall Asleep, Where Do We Go?', '2020-12-20', '21:00:00', 'Billie Eilish.jpg', '', 2200, 2200),
(10, 'Sam Smith LIVE CONSERRT LOVE GOES', 'Para celebrar el lanzamiento de su próximo álbum Love Goes, Sam Smith vuelve a los icónicos Abbey Road Studios para una actuación exclusiva en vivo para el mundo entero.', '2021-10-30', '20:30:00', 'Sam Smith.jpg', '', 2200, 2200),
(11, 'Future Nostalgia Tour', 'Future Nostalgia Tour será la serie oficial de conciertos de la cantante británica Dua Lipa. La gira apoya su álbum de estudio Future Nostalgia', '2021-01-03', '20:00:00', 'Dua Lipa.jpg', '', 2200, 2200),
(12, 'LOVE ON TOUR 2020', 'Harry Styles ha anunciado su concierto en vivo 2020, \"Love On Tour\", en apoyo a su próximo álbum Fine Line.', '2020-12-28', '20:00:00', 'Harry Styles.jpg', '', 2000, 2000),
(13, 'THE COURAGUE TOUR', 'Sera la serie de conciertos en vivo que ofrecera Sia para promocionar su álbum We Are Born.', '2021-03-03', '21:00:00', 'SIA.jpg', '', 1900, 1900),
(14, '24K Magic Woorld Tour', 'Es el tercer concierto en vivo del cantante estadounidense Bruno Mars, para promocionar su álbum 24K Magic.', '2021-03-28', '19:00:00', 'Bruno Mars.jpg', '', 1700, 2100),
(15, 'Miley Cyrus & Her Dead Petz Tour', 'Es la siguiente actuación en vivo de la cantautora estadounidense Miley Cyrus, realizada para promover su álbum experimental gratuito, que lanzó en los VMA\'s.', '2021-06-05', '21:00:00', 'Miley Cyrus.jpg', '', 2000, 2200),
(20, 'El Mal Querer Tour', 'Es la segunda entrega de conciertos de la cantante y compositora española Rosalía, realizada con el fin de promocionar su segundo álbum de estudio, El mal querer.', '2021-02-17', '20:00:00', 'Rosalía.jpg', '', 1700, 2200),
(21, '÷ (divide) Tour', 'Es la tercera serie de conciertos del cantante y compositor inglés Ed Sheeran, en apoyo a su tercer álbum de estudio, ÷.', '2020-12-15', '20:30:00', 'Ed Sheeran.jpg', '', 2200, 2200),
(22, 'Joanne & Gaga Tour', 'Quinta serie de conciertos como solista y sexta en general de la cantautora estadounidense Lady Gaga, realizada para promover su quinto álbum de estudio, Joanne.', '2021-05-06', '22:00:00', 'Lady Gaga.jpg', '', 2300, 2300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `idP` tinyint(11) NOT NULL,
  `nameP` varchar(255) NOT NULL,
  `costP` float NOT NULL,
  `ArtistidA` tinyint(11) NOT NULL,
  `imgP` varchar(50) NOT NULL,
  `descP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`idP`, `nameP`, `costP`, `ArtistidA`, `imgP`, `descP`) VALUES
(2, 'Fundas de ADELE LIVE 2020', 1234, 2, 'adele-2.jpg', 'Fundas edición especial mono'),
(3, 'Fine Line Playera Negra', 650, 6, 'harrystyles-3.jpg', 'Playera en tallas S/M/L. Oficial. Limitada'),
(4, 'Some People Have Real Problems T-Shirt', 300, 7, 'sia-4.jpg', 'Playera en tallas S/M/L. Semi Oficial. Varios Colores'),
(5, 'Calcetas Yellow Nostalgic', 250, 5, 'dualipa-5.jpg', 'Par de calcetines de vestir algodón Oficial'),
(6, 'Playera Oficial del Album ', 900, 14, 'beyonce-6.png', 'Playera en tallas S/M/L. Oficial. Varios Colores'),
(7, 'Playera Large Chromatica 2020 Negra', 700, 12, 'ladygaga-7.png', 'Playera manga larga tallas S/M Oficial. Solo Color Negro'),
(8, 'Short Chromatica PINK', 946, 12, 'ladygaga-8.png', 'Playera en tallas S/M/L. Oficial. Varios Colores'),
(9, 'Fine Line Portada Playera', 900, 6, 'harrystyles-9.jpg', 'Playera tallas XS/S/M Oficial. Colores Azul/Negra/Gris'),
(26, 'Playera Adele Blanca Dibujo', 125, 2, 'adele-10.jpeg', 'Playera con dibujo lineado'),
(27, 'Playera Adele Negra Disco', 899, 2, 'adele-11.jpg', 'Playera conmemorativa del merch odifical'),
(28, 'Billie Sudadera Cuadros Verde', 1596, 3, 'billieelish-13.jpg', 'Sudadera'),
(29, 'BTS Playera BE Oficial', 2599, 1, 'bts-16.jpg', 'Oficial del album \"BE\"'),
(30, 'Playera Manga Larga <Lights> Miley Cirus', 699, 9, 'mileycirus-14.jpg', 'Playera Manga Larga <Lights> Miley Cirus'),
(31, 'Playera <DISCO> Miley Cirus', 789, 9, 'mileycirus-15.jpg', 'Playera <DISCO> Miley Cirus'),
(32, 'Sudadera <ANTI> 2020', 456, 13, 'rihanna-17.jpg', 'Playera <DISCO> Miley Cirus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase`
--

CREATE TABLE `purchase` (
  `ProductidP` tinyint(11) NOT NULL,
  `UseridU` tinyint(11) NOT NULL,
  `folio` tinyint(11) NOT NULL,
  `tipoPago` varchar(30) NOT NULL,
  `cantP` tinyint(100) NOT NULL,
  `total` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `idR` tinyint(11) NOT NULL,
  `nameR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`idR`, `nameR`) VALUES
(1, 'SuperAdmin'),
(2, 'Eventos'),
(3, 'Tienda'),
(4, 'Contacto'),
(5, 'Customer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idS` tinyint(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `UseridU` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idU` tinyint(11) NOT NULL,
  `nameU` varchar(25) NOT NULL,
  `passU` varchar(15) NOT NULL,
  `firstnameU` varchar(100) NOT NULL,
  `lastnameU` varchar(100) NOT NULL,
  `emailU` varchar(255) NOT NULL,
  `phoneU` varchar(12) DEFAULT NULL,
  `RoleidR` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idU`, `nameU`, `passU`, `firstnameU`, `lastnameU`, `emailU`, `phoneU`, `RoleidR`) VALUES
(1, 'jaime.dcb@hotmail.com', 'jm10dn16', 'DANIEL', 'CRUZ BUSTAMANTE', 'jaime.dcb@hotmail.com', '6371149255', 1),
(2, 'Jesus H', 'Elpollis06', 'JESUS', ' HERNANDEZ', 'pollito.amrillo@hotmail.com', '8716549235', 2),
(3, 'Fransisco A', 'pacoelchato06', 'JESUS FRANCISCO', 'AGUILERA', 'paco.0906@hotmail.com', '4698521365', 3),
(4, 'María A', 'hwasa123', 'MARÏA', 'GOMEZ ANTUNEZ', 'maga.1234@hotmail.com', '6598561472', 4),
(5, 'Samuel D', 'viki777', 'SAMUEL', 'DE LUQUE', 'vege.777@hotmail.com', '7774591236', 5),
(6, 'Carol MG', 'yoonie', 'CAROLINA REBECCA', 'MEDINA GONZALEZ ', 'caro.coriana@hotmail.com', '8715849079', 1),
(27, 'CAMIONES889', 'verde1699', 'Fausto', 'Urías', 'camiones@gamil.com', '6373721935', 3),
(32, '18131229', 'verde1699', 'Jaime Daniel', 'Bustamante', 'jaime@hotmail.com', '6371149255', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`EventidE`,`UseridU`,`folio`),
  ADD UNIQUE KEY `folio` (`folio`),
  ADD KEY `typeA` (`typeA`);

--
-- Indices de la tabla `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`idA`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carritoId`);

--
-- Indices de la tabla `eventassignament`
--
ALTER TABLE `eventassignament`
  ADD PRIMARY KEY (`ArtistidA`,`EventidE`,`folio`),
  ADD KEY `folio` (`folio`),
  ADD KEY `Fk_Event_Artist` (`EventidE`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idE`),
  ADD UNIQUE KEY `nameE` (`nameE`),
  ADD KEY `nameE_2` (`nameE`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idP`),
  ADD UNIQUE KEY `nameP` (`nameP`),
  ADD KEY `Fk_Product_Artist` (`ArtistidA`);

--
-- Indices de la tabla `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`ProductidP`,`UseridU`,`folio`),
  ADD UNIQUE KEY `folio` (`folio`),
  ADD KEY `folio_2` (`folio`),
  ADD KEY `cantP` (`cantP`),
  ADD KEY `Fk_Product_Purschase_User` (`UseridU`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idR`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idS`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `FKSesion662130` (`UseridU`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `idU` (`idU`),
  ADD UNIQUE KEY `nameU` (`nameU`),
  ADD UNIQUE KEY `emailU` (`emailU`),
  ADD KEY `FKUser118663` (`RoleidR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artist`
--
ALTER TABLE `artist`
  MODIFY `idA` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carritoId` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idE` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `idP` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `idR` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idS` tinyint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idU` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventassignament`
--
ALTER TABLE `eventassignament`
  ADD CONSTRAINT `Fk_Artist_Event` FOREIGN KEY (`ArtistidA`) REFERENCES `artist` (`idA`),
  ADD CONSTRAINT `Fk_Event_Artist` FOREIGN KEY (`EventidE`) REFERENCES `evento` (`idE`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Fk_Product_Artist` FOREIGN KEY (`ArtistidA`) REFERENCES `artist` (`idA`);

--
-- Filtros para la tabla `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `Fk_Product_Purschase` FOREIGN KEY (`ProductidP`) REFERENCES `product` (`idP`),
  ADD CONSTRAINT `Fk_Product_Purschase_User` FOREIGN KEY (`UseridU`) REFERENCES `user` (`idU`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `FKSesion662130` FOREIGN KEY (`UseridU`) REFERENCES `user` (`idU`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKUser118663` FOREIGN KEY (`RoleidR`) REFERENCES `role` (`idR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
