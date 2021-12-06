-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2021 às 21:40
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pro1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `id_cargo` varchar(11) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `title`, `id_cargo`, `bio`) VALUES
(6, 'teste amostra', '2', 'ipslorem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `func`
--

CREATE TABLE `func` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_func` varchar(150) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `dataCon` date DEFAULT NULL,
  `id_func` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `func`
--

INSERT INTO `func` (`id`, `nome_func`, `cpf`, `cargo`, `dataCon`, `id_func`) VALUES
(21, 'funcionario teste', '1233445345', 'Ajax teste', '2021-12-20', '2'),
(22, 'funcionario teste', '123123', 'teste amostra', '2021-12-29', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `senha`, `image`, `token`) VALUES
(5, 'teste3', 'testando', 'teste3@teste.com', '$2y$10$ZlyF3dmnSHtOYlbajk6zdeU0fmi99v3NKhFWmA', NULL, '046ca446e672f39d4ab79e716835be0b2f12fdf7d5d552ee01dcbd7eab8e88ed6ab8176a898700af2d5aef31c100a0ed13d3'),
(6, 'teste4', 'teste', 'teste4@teste.com', '$2y$10$VljKq9fgRu2KRvRodzep8O1us0f/MoHne8TqGf', NULL, 'b0d2d5b77731e75cb8c91d2b00bfef5c30378eeba495854a8a3c49f384943086d0c03800e3a4004cbb518bcea1b2a599bc41'),
(9, 'teste2', 'testando', 'teste2@teste.com', '$2y$10$kI6mmK95QhTm/ArWqfBdiuXHPvSjRJGRG5Il/n', NULL, 'dae7bb927fac5fafcb7d687c58d3420170a31a8061e2fe0291af5bee8dab64bc546231f397e8cbd0a905dde3815c12ebc890'),
(10, 'Zeca', 'testando', 'teste6@teste.com', '$2y$10$3brQbAhaxza5rgP4ulIzUuA.na5XDnVw1klfmj', NULL, '566054524af8dc8297104d4ed1723c16f3c5d363d03f3f13bb3ef656d6a3a1aee3661a3cae1657d4483887c6081137635ec5'),
(11, 'teste123', 'teste', 'sa00@gmail.com', '$2y$10$WKOghs6tQ9879w.sarJlZufuWobt/x45/glD/m', NULL, '08637d2988631c07fdf8696d105921d1100d6354f1e42bd04debe29ed833af876cfa78edc7f1e3831be84d3a18f0dac19935'),
(12, 'teste9', 'testando', 'sze@gmail.com', '$2y$10$7s4AYQmrvsNa1k1lIXoJJ.8GcCweYfXZkUCHzx', NULL, 'e9d66e1051718c376208e63d908b1381d603333c575e0f4e6ea0683947c4d5a495ebeb0637bc16f65bd247d3ba6fce4de063');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `func`
--
ALTER TABLE `func`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `func`
--
ALTER TABLE `func`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
