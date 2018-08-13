-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 27-Ago-2016 às 00:35
-- Versão do servidor: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sistema_financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_pai` int(11) DEFAULT NULL,
  `id_nivel_acesso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `caminho` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT '#',
  `style_class_span` varchar(200) DEFAULT NULL,
  `class_span` varchar(200) DEFAULT NULL,
  `style_span_titulo` varchar(100) DEFAULT NULL,
  `style_class_b` varchar(200) DEFAULT NULL,
  `class_b` varchar(200) DEFAULT NULL,
  `posicao` int(3) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel_acesso`
--

CREATE TABLE `tb_nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_nivel_usuario` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu_pai` (`id_menu_pai`),
  ADD KEY `id_usuairo` (`id_usuario`),
  ADD KEY `id_nivel_acesso` (`id_nivel_acesso`);

--
-- Indexes for table `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_nivel_usuario` (`id_nivel_usuario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `fk_id_menu_pai` FOREIGN KEY (`id_menu_pai`) REFERENCES `tb_menu` (`id_menu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_nivel_acesso` FOREIGN KEY (`id_nivel_acesso`) REFERENCES `tb_nivel_acesso` (`id_nivel_acesso`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_nivel_Acesso` FOREIGN KEY (`id_nivel_usuario`) REFERENCES `tb_nivel_acesso` (`id_nivel_acesso`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
