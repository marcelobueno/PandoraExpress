/* -- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 187.45.196.155
-- Generation Time: 03-Dez-2020 às 16:46
-- Versão do servidor: 5.7.17-13-log
-- PHP Version: 5.6.40-0+deb8u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandoraexpress`
--
CREATE DATABASE IF NOT EXISTS `pandoraexpress` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `pandoraexpress`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacoes`
--

CREATE TABLE `anotacoes` (
  `id_anotacao` int(11) NOT NULL,
  `anotacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anotacoes`
--

INSERT INTO `anotacoes` (`id_anotacao`, `anotacao`) VALUES
(1, 'Teste da aplicaÃ§Ã£o em produÃ§Ã£o.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `cnpj_cliente` varchar(14) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `tel_cliente` varchar(11) NOT NULL,
  `end_cliente` varchar(255) NOT NULL,
  `end_num_cliente` varchar(100) NOT NULL,
  `end_comp_cliente` varchar(255) NOT NULL,
  `end_bairro_cliente` varchar(100) NOT NULL,
  `end_cidade_cliente` varchar(100) NOT NULL,
  `end_estado_cliente` varchar(2) NOT NULL,
  `end_cep_cliente` varchar(8) NOT NULL,
  `status_cliente` enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `cnpj_cliente`, `email_cliente`, `tel_cliente`, `end_cliente`, `end_num_cliente`, `end_comp_cliente`, `end_bairro_cliente`, `end_cidade_cliente`, `end_estado_cliente`, `end_cep_cliente`, `status_cliente`) VALUES
(1, 'PRO VIDA FARMACIA DE MANIPULACAO LTDA', '09665467000125', 'socorroprovida@gmail.com', '1144371030', 'RUA CORONEL ALFREDO FLAQUER', '370', '', 'CENTRO', 'SANTO ANDRE', 'SP', '09020-04', 'Ativo'),
(2, 'BARAKALLAH PRAIA E FTNESS LTDA', '12523980000277', 'TATIANE@LIQUIDOSTORE.COM.BR', '1133114830', 'RUA  SILVA TELES', '1465', 'SALA 03', 'PARI', 'SAO PAULO', 'SP', '03026000', 'Ativo'),
(3, 'BLESS ME CONFECCOES EIRELI', '30310223000116', 'CONTATO@PRAAIAH.COM.BR', '1133114830', 'RUA SILVA TELES', '1465', 'SALA 02 ANDAR 2', 'PARI', 'SAO PAULO', 'SP', '03026001', 'Ativo'),
(4, 'CHROMA LIQUIDO SOLUCOES TECNOLOGICAS LTDA', '38422231000166', 'LEGALIZACAO@OMEGACONTABILIDADE.COM', '1141261500', 'RUA SILVA TELES', '1465', 'SALA 05', 'PARI', 'SAO PAULO', 'SP', '03026001', 'Ativo'),
(5, 'MASSAR PROTECAO E HIGIENE LTDA', '36452002000168', 'MOHAMED@MEDITERRANEUM.COM.BR', '1123700000', 'RUA SILVA TELES', '1465', 'ANEXO I', 'PARI', 'SAO PAULO', 'SP', '03026001', 'Ativo'),
(6, 'WARDY CONFECCOES LTDA', '02536490000170', 'LAMIA@LIQUIDO.COM.BR', '1133132009', 'RUA SILVA TELES', '1465', '', 'PARI', 'SAO PAULO', 'SP', '03026000', 'Ativo'),
(7, 'SIVE SECURITIZADORA S.A', '19603334000188', 'JESSICA@SIVESECURITIZADORA.COM', '1143654656', 'RUA LONDRINA', '470', '', 'RUDGE RAMOS', 'SAO BERNARDO DO CAMPO', 'SP', '09635100', 'Ativo'),
(8, 'LUCKAU INDUSTRIA E COMERCIO DE ALIMENTOS EIRELI', '33188102000131', 'VENDAS@LUCKAU.COM.BR', '1147425253', 'RUA JOSE DE MASCARENHAS', '1353', '', 'VILA MATILDE', 'SAO PAULO', 'SP', '03515000', 'Ativo'),
(9, 'SAMIRA', '16723338812', 'SAMIRA@GAMIL.COM.BR', '993090445', 'RUA JOAO DE CASTELHANOS', '64', 'APTO.161', 'SANTANA', 'SAO PAULO', 'SP', '02407030', 'Ativo'),
(10, 'FERNANDA DOS SANTOS PESSAN', '00000000000', 'FERNANDA.S.PESAN@GMAIL.COM', '996438484', 'RUA ANHANGUERA', '187', '', 'VILA CURUÃ‡A', 'SANTO ANDRE', 'SP', '09280500', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregas`
--

CREATE TABLE `entregas` (
  `id_entrega` int(11) NOT NULL,
  `id_ordem_servico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_motoboy` int(11) NULL,
  `data_entrega` date NULL,
  `forma_pagamento` enum('dinheiro','cartão') NOT NULL,
  `valor_mercadoria` double(10,2) NOT NULL,
  `cobranca_extra` double(10,2) NULL,
  `id_tabela_preco` int(11) NULL,
  `nome_destinatario` varchar(100) NULL,
  `end_entrega` varchar(100) NULL,
  `end_num_entrega` varchar(100) NULL,
  `end_bairro_entrega` varchar(100) NULL,
  `end_cidade_entrega` varchar(100) NULL,
  `end_estado_entrega` varchar(2) NULL,
  `end_cep_entrega` varchar(8) NULL,
  `end_comp_entrega` varchar(255) NULL,
  `status_entrega` enum('Em aberto','Em andamento','Entregue','Cancelada','Retorno') NOT NULL,
  `observacoes` text NULL,
  `nf_origem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoboys`
--

CREATE TABLE `motoboys` (
  `id_motoboy` int(11) NOT NULL,
  `nome_motoboy` varchar(100) NOT NULL,
  `cpf_motoboy` varchar(14) NOT NULL,
  `email_motoboy` varchar(100) NOT NULL,
  `tel_motoboy` varchar(11) NOT NULL,
  `end_motoboy` varchar(255) NOT NULL,
  `end_num_motoboy` varchar(100) NOT NULL,
  `end_comp_motoboy` varchar(255) NOT NULL,
  `end_bairro_motoboy` varchar(100) NOT NULL,
  `end_cidade_motoboy` varchar(100) NOT NULL,
  `end_estado_motoboy` varchar(2) NOT NULL,
  `end_cep_motoboy` varchar(8) NOT NULL,
  `status_motoboy` enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motoboys`
--

INSERT INTO `motoboys` (`id_motoboy`, `nome_motoboy`, `cpf_motoboy`, `email_motoboy`, `tel_motoboy`, `end_motoboy`, `end_num_motoboy`, `end_comp_motoboy`, `end_bairro_motoboy`, `end_cidade_motoboy`, `end_estado_motoboy`, `end_cep_motoboy`, `status_motoboy`) VALUES
(1, 'JONATHAN EGILDO DA SILVA', '31782299000107', 'JONATHAN.MAVERIK@GMAIL.COM', '11951243844', 'RUA VASCONCELOS', '86', '', 'BATISTINI', 'SAO BERNARDO DO CAMPO', 'SP', '09842066', 'Ativo'),
(2, 'MARCUS VINICIUS LOPES DOS SANTOS', '33273029000104', 'M.1533444@GMAIL.COM', '1143562581', 'RUA SIQUEIRA CAMPOS (VL MARCHI)', '348', 'APTO.21', 'ASSUNCAO', 'SAO BERNARDO DO CAMPO', 'SP', '09810460', 'Ativo'),
(3, 'WILLIAN DANIEL MARCIANO', '30288882000101', 'WILLIAN-ZO@HOTMAIL.COM', '1144727368', 'RUA JUTLANDIA', '46', 'CASA 02', 'PARQUE CAPUAVA', 'SANTO ANDRE', 'SP', '09271160', 'Ativo'),
(4, 'JOHNNATHAN FARIAS MARTINS', '31046862000189', 'JOHWJOHNNATHAN@GMAIL.COM', '1144252544', 'RUA LUPE COTRIN GARAUDE', '129', '', 'JARDIM JAMAICA', 'SANTO ANDRE', 'SP', '09185450', 'Ativo'),
(5, 'SERGIO FARIAS MARTINS', '31161161000190', 'SERGIOFARIASMARTINS@GMAIL.COM', '1144252544', 'RUA LUPE COTRIN GARAUDE', '129', 'CASA 01', 'JARDIM JAMAICA', 'SANTO ANDRE', 'SP', '09185450', 'Ativo'),
(6, 'DANILO RODRIGO DE ALMEIDA CALADO', '30815139000154', 'LIONS@LIONSCONTABIL.COM.BR', '1126776977', 'RUA ENG.ALFREDO HEITZMANN JUNIOR', '335', '', 'JARDIM MAREK', 'SANTO ANDRE', 'SP', '09111360', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_servico`
--

CREATE TABLE `ordem_servico` (
  `id_ordem` int(11) NOT NULL,
  `data_os` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `status_os` enum('Aberta','Fechada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ordem_servico`
--

INSERT INTO `ordem_servico` (`id_ordem`, `data_os`, `id_cliente`, `status_os`) VALUES
(1, '2020-12-01', 1, 'Aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `retornos`
--

CREATE TABLE `retornos` (
  `id_retorno` int(11) NOT NULL,
  `flag` enum('Retorno 1','Retorno 2','Retorno 3','Retorno 4','Retorno 5') COLLATE latin1_general_ci DEFAULT NULL,
  `id_entrega` int(11) NOT NULL,
  `id_tabela` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_retorno` date NOT NULL,
  `status_retorno` enum('Em aberto','Em andamento','Entregue','Cancelada') COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_preco`
--

CREATE TABLE `tabela_preco` (
  `id_tabela_preco` int(11) NOT NULL,
  `nome_tabela` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `tipo_cobranca` enum('Entrega','Distancia','Hora') NOT NULL,
  `valor_cobranca` double(10,2) NOT NULL,
  `status_tabela` enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabela_preco`
--

INSERT INTO `tabela_preco` (`id_tabela_preco`, `nome_tabela`, `id_cliente`, `tipo_cobranca`, `valor_cobranca`, `status_tabela`) VALUES
(1, 'SP ECONOMICO', 2, 'Entrega', 10.00, 'Ativo'),
(2, 'ABC ECONOMICO', 2, 'Entrega', 9.00, 'Ativo'),
(3, 'SP EXPRESSO', 2, 'Entrega', 25.00, 'Ativo'),
(4, 'ABC EXPRESSO', 2, 'Entrega', 25.00, 'Ativo'),
(5, 'SP ECONOMICO', 3, 'Entrega', 10.00, 'Ativo'),
(6, 'ABC ECONOMICO', 3, 'Entrega', 9.00, 'Ativo'),
(7, 'SP EXPRESSO', 3, 'Entrega', 25.00, 'Ativo'),
(8, 'ABC EXPRESSO', 3, 'Entrega', 25.00, 'Ativo'),
(9, 'SP ECONOMICO', 4, 'Entrega', 10.00, 'Ativo'),
(10, 'ABC ECONOMICO', 4, 'Entrega', 9.00, 'Ativo'),
(11, 'SP', 1, 'Entrega', 15.00, 'Ativo'),
(12, 'ABC', 1, 'Entrega', 8.00, 'Ativo'),
(13, 'CONVENIO', 1, 'Entrega', 8.00, 'Ativo'),
(14, 'HORA', 7, 'Hora', 14.00, 'Ativo'),
(15, 'SP ECONOMICO CX PEQ', 8, 'Entrega', 15.00, 'Ativo'),
(16, 'ABC ECONOMICO CX PEQ', 8, 'Entrega', 9.00, 'Ativo'),
(17, 'SP ECONOMICO CX GDE', 8, 'Entrega', 20.00, 'Ativo'),
(18, 'ABC ECONOMICO CX GDE', 2, 'Entrega', 20.00, 'Ativo'),
(19, 'SP EXPRESSO', 8, 'Entrega', 25.00, 'Ativo'),
(20, 'ABC EXPRESSO', 8, 'Entrega', 25.00, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `status_usuario` enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`, `nome_usuario`, `status_usuario`) VALUES
(1, 'marcelo', 'cbd5262db769a4c0172bb805234e8998', 3, 'Marcelo Bueno', 'Ativo'),
(2, 'milene', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Milene', 'Ativo'),
(3, 'operador1', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Leonardo', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD PRIMARY KEY (`id_anotacao`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cnpj_cliente` (`cnpj_cliente`);

--
-- Indexes for table `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `fk_id_ordem` (`id_ordem_servico`),
  ADD KEY `fk_id_cliente_entrega` (`id_cliente`),
  ADD KEY `fk_id_motoboy` (`id_motoboy`),
  ADD KEY `fk_id_tabela` (`id_tabela_preco`);

--
-- Indexes for table `motoboys`
--
ALTER TABLE `motoboys`
  ADD PRIMARY KEY (`id_motoboy`),
  ADD UNIQUE KEY `cpf_motoboy` (`cpf_motoboy`);

--
-- Indexes for table `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD PRIMARY KEY (`id_ordem`),
  ADD KEY `fk_id_cliente` (`id_cliente`);

--
-- Indexes for table `retornos`
--
ALTER TABLE `retornos`
  ADD PRIMARY KEY (`id_retorno`),
  ADD KEY `fk_id_cliente_ret` (`id_cliente`),
  ADD KEY `fk_id_entrega` (`id_entrega`),
  ADD KEY `fk_id_tabelapreco` (`id_tabela`);

--
-- Indexes for table `tabela_preco`
--
ALTER TABLE `tabela_preco`
  ADD PRIMARY KEY (`id_tabela_preco`),
  ADD KEY `fk_id_tabela_cliente` (`id_cliente`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anotacoes`
--
ALTER TABLE `anotacoes`
  MODIFY `id_anotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motoboys`
--
ALTER TABLE `motoboys`
  MODIFY `id_motoboy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordem_servico`
--
ALTER TABLE `ordem_servico`
  MODIFY `id_ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retornos`
--
ALTER TABLE `retornos`
  MODIFY `id_retorno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabela_preco`
--
ALTER TABLE `tabela_preco`
  MODIFY `id_tabela_preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `fk_id_cliente_entrega` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_id_motoboy` FOREIGN KEY (`id_motoboy`) REFERENCES `motoboys` (`id_motoboy`),
  ADD CONSTRAINT `fk_id_ordem` FOREIGN KEY (`id_ordem_servico`) REFERENCES `ordem_servico` (`id_ordem`),
  ADD CONSTRAINT `fk_id_tabela` FOREIGN KEY (`id_tabela_preco`) REFERENCES `tabela_preco` (`id_tabela_preco`);

--
-- Limitadores para a tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Limitadores para a tabela `retornos`
--
ALTER TABLE `retornos`
  ADD CONSTRAINT `fk_id_cliente_ret` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_id_entrega` FOREIGN KEY (`id_entrega`) REFERENCES `entregas` (`id_entrega`),
  ADD CONSTRAINT `fk_id_tabelapreco` FOREIGN KEY (`id_tabela`) REFERENCES `tabela_preco` (`id_tabela_preco`);

--
-- Limitadores para a tabela `tabela_preco`
--
ALTER TABLE `tabela_preco`
  ADD CONSTRAINT `fk_id_tabela_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 */