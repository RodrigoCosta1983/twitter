-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2020 às 20:03
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `twitter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweet`
--

CREATE TABLE `tweet` (
  `id_tweet` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tweet` varchar(140) NOT NULL,
  `data_inclusao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `id_usuario`, `tweet`, `data_inclusao`) VALUES
(38, 6, 'Marte', '2020-06-03 02:07:01'),
(41, 6, 'bom', '2020-06-03 02:07:52'),
(43, 1, 'globoLixo', '2020-06-03 02:32:22'),
(44, 1, 'Rei Leão', '2020-06-03 03:17:33'),
(45, 3, 'American Pier', '2020-06-03 03:18:36'),
(46, 1, 'Boa', '2020-06-03 03:32:38'),
(47, 1, 'Brahma', '2020-06-03 03:33:35'),
(48, 1, 'Flamengo', '2020-06-03 03:44:05'),
(49, 1, 'Fla', '2020-06-03 03:46:43'),
(50, 1, 'FlaFlu', '2020-06-03 03:47:28'),
(52, 3, 'JN_FAKE_NEWs', '2020-06-03 13:51:16'),
(53, 1, 'Tabs Dropdowns Accordions Side Navigation Top Navigation Modal Boxes Progress Bars Parallax Login Form HTML Includes Google Maps Range Slide', '2020-06-03 22:04:22'),
(54, 7, 'Java entrou', '2020-06-04 18:02:40'),
(55, 7, 'Tabs Dropdowns Accordions Side Navigation Top Navigation Modal Boxes Progress Bars Parallax Login Form HTML Includes Google Maps Range Slide', '2020-06-04 18:03:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`) VALUES
(1, 'rodrigo', 'oasoksa@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'maria', 'maria@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'hellen', 'hellen@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'joao', 'joao@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'php', 'php@oi.com.br', 'e1bfd762321e409cee4ac0b6e841963c'),
(6, 'sophie', 'sophie@shophie.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'java', 'java@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'rc', 'rc@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'sp', 'sp@oi.com.br', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_seguidores`
--

CREATE TABLE `usuarios_seguidores` (
  `id_usuario_seguidor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `seguindo_id_usuario` int(11) NOT NULL,
  `data_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios_seguidores`
--

INSERT INTO `usuarios_seguidores` (`id_usuario_seguidor`, `id_usuario`, `seguindo_id_usuario`, `data_registro`) VALUES
(72, 6, 1, '2020-05-24 20:39:46'),
(74, 3, 1, '2020-05-24 21:43:07'),
(76, 9, 1, '2020-05-24 22:14:38'),
(77, 4, 1, '2020-05-24 22:18:37'),
(81, 1, 3, '2020-05-24 22:56:23'),
(89, 1, 8, '2020-05-27 02:37:29'),
(94, 1, 6, '2020-05-27 02:54:50'),
(98, 1, 7, '2020-05-27 02:57:32'),
(99, 1, 2, '2020-05-27 02:58:20'),
(100, 1, 4, '2020-05-27 02:59:48'),
(101, 7, 1, '2020-05-27 03:01:53'),
(102, 7, 2, '2020-05-27 04:23:04'),
(103, 7, 4, '2020-05-27 04:23:06'),
(105, 1, 5, '2020-05-30 04:37:04'),
(106, 1, 9, '2020-05-30 04:41:14'),
(110, 9, 6, '2020-05-30 05:11:37'),
(111, 9, 5, '2020-05-30 05:11:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id_tweet`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  ADD PRIMARY KEY (`id_usuario_seguidor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id_tweet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  MODIFY `id_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
