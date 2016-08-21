-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Ago-2016 às 20:43
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reserva_facil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
`idReserva` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `data` date NOT NULL,
  `horaInicial` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`idReserva`, `idUsuario`, `idSala`, `data`, `horaInicial`, `descricao`) VALUES
(18, 4, 6, '2016-08-21', 8, 'Reunião 1'),
(19, 5, 6, '2016-08-21', 9, 'Teste Reserva'),
(20, 5, 7, '2016-08-21', 18, '54554'),
(21, 5, 7, '2016-08-22', 13, 'Rtrttrtr'),
(22, 5, 7, '2016-08-22', 15, 'Jhjh'),
(23, 5, 6, '2016-08-22', 11, 'Hhghgh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
`idSala` int(11) NOT NULL,
  `nomeSala` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`idSala`, `nomeSala`) VALUES
(6, 'Sala 1'),
(7, 'Sala 2'),
(8, 'Sala 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivelAcesso` int(11) NOT NULL COMMENT '0 = total / 1 = parcial',
  `situacao` int(11) NOT NULL COMMENT '0 = ativo / 1 = bloqueado'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `senha`, `email`, `nivelAcesso`, `situacao`) VALUES
(4, 'Moisés Gomes', 'admin', 'admin@admin.com', 0, 0),
(5, 'Fulano da Silva', 'usuario', 'usuario@usuario.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
 ADD PRIMARY KEY (`idReserva`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `data` (`data`), ADD KEY `idSala` (`idSala`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
 ADD PRIMARY KEY (`idSala`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idSala`) REFERENCES `salas` (`idSala`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
