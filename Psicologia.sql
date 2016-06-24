-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2016 at 01:41 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Psicologia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `status`) VALUES
(1, 'circulos', 1),
(2, 'cuadrados', 1),
(3, 'animales', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id`, `foto`, `status`) VALUES
(1, 'figuras-geometricas-circulo.png', 0),
(2, 'Circulo-Vicioso.jpg', 0),
(3, 'vinilos-decorativos-adhesivos-circulos-de-colores.jpg', 0),
(4, 'circulo-300x300.jpg', 0),
(5, 'marcos-cuadrados.jpg', 0),
(6, '24751103-Cuadrados-forma-abstracta-y-caza-rect-ngulo-en-la-transparencia-estructura-de-fondo-Foto-de-archivo.jpg', 0),
(7, 'cuadrados.jpg', 0),
(8, 'cuadrados.png', 0),
(9, '250px-HLSColorSpace.png', 0),
(10, 'circulos.jpeg', 0),
(11, 'animales1.jpg', 0),
(12, 'animales2.jpg', 0),
(13, 'animales3.jpg', 0),
(14, 'animales4.jpeg', 0),
(15, 'animales5.jpg', 0),
(16, 'animales6.jpg', 0),
(17, 'animales7.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `imagenes_categorias`
--

CREATE TABLE `imagenes_categorias` (
  `id` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagenes_categorias`
--

INSERT INTO `imagenes_categorias` (`id`, `id_imagen`, `id_categoria`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 1),
(10, 10, 1),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `ap_paterno` varchar(60) NOT NULL,
  `ap_materno` varchar(60) NOT NULL,
  `edad` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `ap_paterno`, `ap_materno`, `edad`, `password`, `id_role`, `status`) VALUES
(1, 'erick10', 'erick', 'reyes', 'cruz', 20, 'erick', 1, 0),
(2, 'andrea123', 'andrea', 'de luna', 'g', 20, '123', 2, 0),
(3, 'carl123', 'carlos', 'diaz', 'rodriguez', 30, '123', 2, 0),
(4, 'ad123', 'adrian', 'monroe', 'johnson', 25, '123', 2, 0),
(5, 'reyes10', 'erick', 'reyes', 'cruz', 20, '123', 2, 0),
(6, 'dan10', 'daniel', 'martinez', 'perez', 24, '123', 1, 0),
(7, 'jon10', 'jonatan', 'lopez', 'diaz', 40, '123', 2, 0),
(8, 'gil10', 'gilberto', 'jhonson', 'valdez', 25, '123', 2, 0),
(9, 'alan123', 'alan', 'rivera', 'gonzalez', 0, '123', 2, 0),
(10, 'erickreyes', 'erick', 'reyes', 'cruz', 20, '123', 1, 1),
(11, 'tim10', 'tim', 'jhonson', 'patt', 30, '123', 2, 0),
(12, 'we10', 'wewe', 'wewe', 'wewe', 20, '123', 2, 0),
(13, 'admin10', 'admin', 'na', 'na', 30, '123', 3, 1),
(14, 'adrian123', 'adrian', 'garcia', 'flores', 0, '123', 3, 0),
(15, 'humberto10', 'humberto', 'moreno', 'herrera', 0, '123', 2, 0),
(16, 'jesus123', 'jesus', 'ordaz', 'perez', 40, '123', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_categorias`
--

CREATE TABLE `usuarios_categorias` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `respuesta` int(3) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_categorias`
--

INSERT INTO `usuarios_categorias` (`id`, `id_usuario`, `id_categoria`, `respuesta`, `tiempo`, `status`) VALUES
(1, 2, 1, 3, 5, 1),
(2, 2, 2, 1, 5, 1),
(3, 16, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_imagenes`
--

CREATE TABLE `usuarios_imagenes` (
  `id` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagenes_categorias`
--
ALTER TABLE `imagenes_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_categorias`
--
ALTER TABLE `usuarios_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_imagenes`
--
ALTER TABLE `usuarios_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `imagenes_categorias`
--
ALTER TABLE `imagenes_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuarios_categorias`
--
ALTER TABLE `usuarios_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios_imagenes`
--
ALTER TABLE `usuarios_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
