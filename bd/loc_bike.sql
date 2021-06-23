-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Maio-2021 às 05:10
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loc_bike`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alugam`
--

CREATE TABLE `alugam` (
  `data_do_aluguel` varchar(10) DEFAULT NULL,
  `qtnd_tempo` varchar(100) DEFAULT NULL,
  `data_devolucao` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_bicicleta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bicicleta`
--

CREATE TABLE `bicicleta` (
  `id` int(11) NOT NULL,
  `nome_modelo` varchar(100) NOT NULL,
  `preco` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bicicleta`
--

INSERT INTO `bicicleta` (`id`, `nome_modelo`, `preco`, `foto`, `descricao`) VALUES
(1, 'Bicicleta Ventum', 'R$100,00 Diária', 'af2f029125d69f7ab8edad98686e9490.jpg', 'Melhor modelo Ventum do mercado'),
(2, 'Bicicleta Caloi', 'R$30,00 Diária', '6c0897ab1b.jpg', 'Melhor Caloi do mercado'),
(3, 'Bicicleta Houston', 'R$15,00 Diária', '2552c312737c00eaf8cf494a8782d70f.webp', 'Modelo Houston...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(500) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `data_nascimento` varchar(10) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT 0,
  `endereco_e_numero` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_completo`, `email`, `senha`, `foto`, `data_nascimento`, `cpf`, `isadmin`, `endereco_e_numero`, `bairro`, `cidade`) VALUES
(5, 'Guilherme Silva Sales', 'guilhermesales@outlook.com', 'f7a34ec8785a41ecf2dc75e407ca66a21a136698', NULL, '19/08/2003', '001.002.003-04', 0, 'Antônio Chagas Sobrinho, 192', '2 de Agosto', 'Morada Nova');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alugam`
--
ALTER TABLE `alugam`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_bicicleta` (`id_bicicleta`);

--
-- Índices para tabela `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bicicleta`
--
ALTER TABLE `bicicleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alugam`
--
ALTER TABLE `alugam`
  ADD CONSTRAINT `alugam_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `alugam_ibfk_2` FOREIGN KEY (`id_bicicleta`) REFERENCES `bicicleta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
