-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2019 às 16:20
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `appmobile`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `codadm` int(8) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`codadm`, `nome`, `email`, `senha`) VALUES
(1, 'Admin', 'admin@admin.com', '123'),
(2, 'rodrigo', 'teste@adm.com', '202cb962ac59075');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentocliente`
--

CREATE TABLE `agendamentocliente` (
  `codconsulta` int(8) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(6) NOT NULL,
  `codmedico` int(8) DEFAULT NULL,
  `codpj` int(8) DEFAULT NULL,
  `codespecialidade` int(8) NOT NULL,
  `coddeatendimento` int(8) NOT NULL,
  `codcliente` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamentocliente`
--

INSERT INTO `agendamentocliente` (`codconsulta`, `data`, `hora`, `codmedico`, `codpj`, `codespecialidade`, `coddeatendimento`, `codcliente`) VALUES
(7, '2019-10-10', '10:10', NULL, 4, 7, 13, 5),
(9, '2019-07-09', '12:00', 10, NULL, 4, 9, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codcliente` int(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `identidade` varchar(15) NOT NULL,
  `datadenascimento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tiposanguineo` varchar(5) NOT NULL,
  `doencapreexistente` varchar(150) DEFAULT NULL,
  `medicacao` varchar(100) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `whatsapp` varchar(13) DEFAULT NULL,
  `tipopaciente` varchar(40) NOT NULL,
  `convenio` varchar(40) DEFAULT NULL,
  `tipoconvenio` varchar(40) DEFAULT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codcliente`, `nome`, `email`, `senha`, `cpf`, `identidade`, `datadenascimento`, `sexo`, `tiposanguineo`, `doencapreexistente`, `medicacao`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `telefone`, `celular`, `whatsapp`, `tipopaciente`, `convenio`, `tipoconvenio`, `titular`, `imagem`) VALUES
(5, 'Rodrigo J SilvaS S', 'rodrigodabg@gmail.com', '12345', '198.889.446-50', '6546489484-6', '1996-08-10', 'masculino', 'o+', '', '', '22.260-00', 'Rua SÃ£o Clemente', '107', 'Botafogo', 'Rio de Janeiro', 'RJ', '25351422', '999856994', '999856994', 'particular', '', '', '', '1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinicapj`
--

CREATE TABLE `clinicapj` (
  `codpj` int(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `razaosocial` varchar(100) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clinicapj`
--

INSERT INTO `clinicapj` (`codpj`, `nome`, `razaosocial`, `cnpj`, `email`, `senha`, `imagem`) VALUES
(4, 'CEDOM', 'Centro de Estudos e Diagnostico ', '46.546.545/6456-45', 'teste@test.com', '12345', 'dra.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `codcontato` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `assunto` varchar(20) NOT NULL,
  `mensagem` varchar(400) NOT NULL,
  `codcliente` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`codcontato`, `nome`, `email`, `telefone`, `assunto`, `mensagem`, `codcliente`) VALUES
(1, 'rodrigo', 'rodrigodabg@gmail.com', '25351422', 'Teste', 'hngn21n432n', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `codespecialidade` int(8) NOT NULL,
  `nomeespecialidade` varchar(50) NOT NULL,
  `codmedico` int(11) DEFAULT NULL,
  `codpj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`codespecialidade`, `nomeespecialidade`, `codmedico`, `codpj`) VALUES
(3, 'Clinico Geral', 10, NULL),
(4, 'Cirugiao', 10, NULL),
(7, 'Clinico Geral', NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localdeatendimento`
--

CREATE TABLE `localdeatendimento` (
  `coddeatendimento` int(8) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(40) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `celular` varchar(13) NOT NULL,
  `whatsapp` varchar(13) NOT NULL,
  `codmedico` int(8) DEFAULT NULL,
  `codpj` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localdeatendimento`
--

INSERT INTO `localdeatendimento` (`coddeatendimento`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `telefone`, `celular`, `whatsapp`, `codmedico`, `codpj`) VALUES
(9, '22260-001', 'Rua SÃ£o Clemente', '107', 'Botafogo', 'Rio de Janeiro', 'RJ', '210324654', '210324654', '210324654', 10, NULL),
(13, '22260-009', 'Rua SÃ£o Clemente', '155', 'Botafogo', 'Rio de Janeiro', 'RJ', '2314465465', '21549889965', '21549889965', NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `codmedico` int(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` int(10) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `identidade` varchar(13) NOT NULL,
  `datanasc` varchar(10) NOT NULL,
  `crm` varchar(14) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`codmedico`, `nome`, `email`, `senha`, `cpf`, `identidade`, `datanasc`, `crm`, `sexo`, `imagem`) VALUES
(10, 'Ana Maria ', 'ana@gmail.com', 1234, '098.888.888-88', '19832983983', '1990-10-10', '1495905', 'feminino', 'dra.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`codadm`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `agendamentocliente`
--
ALTER TABLE `agendamentocliente`
  ADD PRIMARY KEY (`codconsulta`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codcliente`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `clinicapj`
--
ALTER TABLE `clinicapj`
  ADD PRIMARY KEY (`codpj`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`codcontato`);

--
-- Índices para tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`codespecialidade`);

--
-- Índices para tabela `localdeatendimento`
--
ALTER TABLE `localdeatendimento`
  ADD PRIMARY KEY (`coddeatendimento`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`codmedico`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `senha_2` (`senha`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `codadm` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `agendamentocliente`
--
ALTER TABLE `agendamentocliente`
  MODIFY `codconsulta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codcliente` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clinicapj`
--
ALTER TABLE `clinicapj`
  MODIFY `codpj` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `codcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `codespecialidade` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `localdeatendimento`
--
ALTER TABLE `localdeatendimento`
  MODIFY `coddeatendimento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `codmedico` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
