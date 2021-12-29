-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2019 às 15:30
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `balanca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caminhao`
--

CREATE TABLE `caminhao` (
  `idBalancaCaminhao` bigint(20) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `tipoCarga` varchar(100) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `pesoVazio` double NOT NULL,
  `pesoCheio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `caminhao`
--

INSERT INTO `caminhao` (`idBalancaCaminhao`, `empresa`, `tipoCarga`, `tamanho`, `pesoVazio`, `pesoCheio`) VALUES
(3, 'Jj', 'arroz', 10, 60, 100),
(4, 'Hhhh', 'ddd', 3, 5, 76),
(5, 'Lllll', 'jjjj', 34, 34, 3443),
(6, 'JHJH', 'jhjh', 2, 2, 2),
(7, 'A', '&lt;script&gt;alert:&quot;oi&quot;&lt;/script&gt;', 1, 12, 13),
(8, 'Miçassa', 'bisteca', 21, 12.5, 12.5),
(9, 'Ssss', 'ssss', 2, 10.9, 10.78);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trem`
--

CREATE TABLE `trem` (
  `idBalancaTrem` bigint(20) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `tipoCarga` varchar(100) NOT NULL,
  `quantidadeVagoes` int(11) NOT NULL,
  `pesoVazio` int(11) NOT NULL,
  `pesoCheio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `trem`
--

INSERT INTO `trem` (`idBalancaTrem`, `empresa`, `tipoCarga`, `quantidadeVagoes`, `pesoVazio`, `pesoCheio`) VALUES
(10, 'Ddd', 'ddd', 9, 777, 77),
(11, '<script>alert:\"oi\"</script>', 'hhhh', 6, 3, 4),
(12, 'Ggg', 'jh', 0, 67, 76),
(13, 'Dddd', 'edd', 34, 98, 96),
(14, 'Ssss', 'sss', 1, 10, 18);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caminhao`
--
ALTER TABLE `caminhao`
  ADD PRIMARY KEY (`idBalancaCaminhao`);

--
-- Índices para tabela `trem`
--
ALTER TABLE `trem`
  ADD PRIMARY KEY (`idBalancaTrem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caminhao`
--
ALTER TABLE `caminhao`
  MODIFY `idBalancaCaminhao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `trem`
--
ALTER TABLE `trem`
  MODIFY `idBalancaTrem` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
