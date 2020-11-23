-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2020 às 20:27
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pandora`
--
CREATE DATABASE IF NOT EXISTS `pandora` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pandora`;

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
(1, '17/11/2020 - Criar sistema de E-mail que notifique os clientes sobre a abertura de Ordens de Serviço.');

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
  `end_cep_cliente` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `cnpj_cliente`, `email_cliente`, `tel_cliente`, `end_cliente`, `end_num_cliente`, `end_comp_cliente`, `end_bairro_cliente`, `end_cidade_cliente`, `end_estado_cliente`, `end_cep_cliente`) VALUES
(1, 'Pró-Vida', '56271867000190', 'exemplo@provida.com.br', '1189897878', 'Rua Exemplo ', '287', 'Próximo a Avenida principal', 'Vila Mariana', 'São Paulo', 'SP', '09786000'),
(2, 'Beauty Forma Comércio de Suplementos LTDA.', '78892256000180', 'AvenidaCapitoJoo1295BairroExemploMau-SP', '1135657867', 'Avenida Capitão João', '1295', 'Próxima a Grecco Transportes', 'Capuava', 'Mauá', 'SP', '09456000'),
(3, 'Vult Cosméticos do ABC LTDA', '19898789000176', 'RuaMarcelinaNovaes78BairroAssunoOsasco-SP', '1154018989', 'Rua Marcelina Novaes', '78', 'Ao lado da Mercearia Davila', 'Vila Assunção', 'Osasco', 'SP', '09456000'),
(4, 'BuenosModa', '45576331885', 'FranciscoJardim622-JardimAnchieta-Mau', '11959244930', 'Rua Francisco Jardim', '622', 'Ao lado da Barbearia Império', 'Jardim Anchieta', 'Mauá', 'SP', '09361000'),
(5, 'MVC Artigos Decorativos', '34586725680', 'mvcdecor@gmail.com', '11978625444', 'Rua Vitório Venneto', '52', 'Próximo a padaria Ouro', 'Vila Nossa Senha das Vitórias', 'Mauá', 'SP', '09361005');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregas`
--

CREATE TABLE `entregas` (
  `id_entrega` int(11) NOT NULL,
  `id_ordem_servico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_motoboy` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `forma_pagamento` enum('dinheiro','cartão') NOT NULL,
  `valor_mercadoria` double(10,2) NOT NULL,
  `cobranca_extra` double(10,2) NOT NULL,
  `id_tabela_preco` int(11) NOT NULL,
  `nome_destinatario` varchar(100) NOT NULL,
  `end_entrega` varchar(100) NOT NULL,
  `end_num_entrega` varchar(100) NOT NULL,
  `end_bairro_entrega` varchar(100) NOT NULL,
  `end_cidade_entrega` varchar(100) NOT NULL,
  `end_estado_entrega` varchar(2) NOT NULL,
  `end_cep_entrega` varchar(8) NOT NULL,
  `end_comp_entrega` varchar(255) NOT NULL,
  `status_entrega` enum('Em aberto','Em andamento','Entregue','Cancelada','Retorno') NOT NULL,
  `observacoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `entregas`
--

INSERT INTO `entregas` (`id_entrega`, `id_ordem_servico`, `id_cliente`, `id_motoboy`, `data_entrega`, `forma_pagamento`, `valor_mercadoria`, `cobranca_extra`, `id_tabela_preco`, `nome_destinatario`, `end_entrega`, `end_num_entrega`, `end_bairro_entrega`, `end_cidade_entrega`, `end_estado_entrega`, `end_cep_entrega`, `end_comp_entrega`, `status_entrega`, `observacoes`) VALUES
(2, 1, 1, 1, '2020-11-01', 'dinheiro', 107.90, 0.00, 1, 'Catharine Bueno', 'Rua Francisco Jardim', '622', 'Jardim Anchieta', 'Mauá', 'SP', '09361000', '', 'Entregue', 'Entregue para a própria cliente.'),
(3, 1, 1, 2, '2020-11-01', 'dinheiro', 109.90, 0.00, 1, 'Maria das Dores', 'Rua Exemplo', '320', 'Bairro Campestre', 'Santo André', 'SP', '09472980', '', 'Retorno', 'Alterado boy de Bruno para Rodrigo'),
(4, 2, 4, 1, '2020-11-01', 'dinheiro', 110.50, 0.00, 4, 'Flavia Tavares', 'Rua Masafusa Yokota', '6', 'Jardim Camila', 'Mauá', 'SP', '09361010', 'Casa 2', 'Entregue', 'Atualizada para Entregue'),
(5, 2, 4, 3, '2020-11-01', 'cartão', 219.90, 0.00, 4, 'Augusto Bernardino de Campos', 'Rua Aquidaban', '560', 'Vila Nossa Senha das Vitórias', 'Mauá', 'SP', '09361150', 'Casa 2', 'Entregue', 'Alterada para Entregue'),
(6, 1, 1, 4, '2020-11-01', 'cartão', 119.90, 0.00, 1, 'Igor Santos', 'Rua Campos Sales', '2190', 'Vila Bocaina', 'Mauá', 'SP', '09361450', 'Bloco 3 Apartamento 515', 'Retorno', 'Teste 2'),
(7, 1, 1, 2, '2020-11-01', 'cartão', 214.00, 5.00, 1, 'VITOR MOAES OS SANTOS', 'RUA EIRAS GARCIA', '159', 'VILA MONMENTO', 'SÃO PAULO', 'SP', '01550030', '', 'Retorno', 'Alterado boy de: Bruno para: Arnaldo'),
(8, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(9, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 6, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(10, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 9, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(11, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(12, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 6, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(13, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(14, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(15, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(16, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(17, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(18, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(19, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(20, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(21, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(22, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', ''),
(23, 1, 1, 2, '2020-11-01', 'cartão', 109.90, 0.00, 1, 'Cliente Exemplo', 'Rua Exemplo', '600', 'Bairro Exemplo', 'Cidade Exemplo', 'SP', '09361000', '', 'Entregue', '');

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
  `end_cep_motoboy` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motoboys`
--

INSERT INTO `motoboys` (`id_motoboy`, `nome_motoboy`, `cpf_motoboy`, `email_motoboy`, `tel_motoboy`, `end_motoboy`, `end_num_motoboy`, `end_comp_motoboy`, `end_bairro_motoboy`, `end_cidade_motoboy`, `end_estado_motoboy`, `end_cep_motoboy`) VALUES
(1, 'José da Silva', '67856756789', 'email@exemplo.com.br', '11978675676', 'Rua Exemplo', '67', '', 'Bairro Exemplo', 'Santo André', 'SP', '09678000'),
(2, 'Rodrigo Ferreira da Silva', '25674527888', 'rodrigo.fdasilva@gmail.com', '11978624476', 'Rua Luiz Antico', '776', '', 'Vila Assis', 'Mauá', 'SP', '09361778'),
(3, 'Bruno de Alcantara Machado', '27391796000190', 'bruno.a.machado@hotmail.com', '11954137979', 'Rua Dijanira Fernandes', '887', '', 'Jardim América', 'São Caetano do Sul', 'SP', '09471000'),
(4, 'Arnaldo Coelho dos Santos', '23678623678', 'arnaldo_c_santos@hotmail.com', '11987456789', 'Rua Capitão José Galo', '76', 'Casa 2', 'Jardim Alzira', 'São Paulo', 'SP', '08765190');

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
(1, '2020-11-01', 1, 'Fechada'),
(2, '2020-10-10', 4, 'Fechada'),
(3, '2020-10-24', 5, 'Fechada'),
(4, '2020-10-24', 1, 'Fechada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `retornos`
--

CREATE TABLE `retornos` (
  `id_retorno` int(11) NOT NULL,
  `flag` enum('Retorno 1','Retorno 2','Retorno 3','Retorno 4','Retorno 5') DEFAULT NULL,
  `id_entrega` int(11) NOT NULL,
  `id_tabela` int(11) NOT NULL,
  `status_retorno` enum('Em aberto','Em andamento','Entregue','Cancelada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `retornos`
--

INSERT INTO `retornos` (`id_retorno`, `flag`, `id_entrega`, `id_tabela`, `status_retorno`) VALUES
(1, 'Retorno 1', 3, 12, 'Entregue'),
(2, 'Retorno 1', 7, 12, 'Entregue'),
(4, 'Retorno 1', 6, 12, 'Entregue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_preco`
--

CREATE TABLE `tabela_preco` (
  `id_tabela_preco` int(11) NOT NULL,
  `nome_tabela` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `tipo_cobranca` enum('Entrega','Distancia','Hora') NOT NULL,
  `valor_cobranca` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabela_preco`
--

INSERT INTO `tabela_preco` (`id_tabela_preco`, `nome_tabela`, `id_cliente`, `tipo_cobranca`, `valor_cobranca`) VALUES
(1, 'Pró-Vida ABC Por Entrega', 1, 'Entrega', 14.00),
(2, 'Buenos Modas ABC por Entrega', 4, 'Entrega', 20.00),
(3, 'Beauty Forma ABC por Entrega', 2, 'Entrega', 19.90),
(4, 'MVC Santo André por Distância', 5, 'Distancia', 12.50),
(5, 'Vult ABC por Hora', 3, 'Hora', 9.50),
(6, 'Pró Vida ABC por Hora', 1, 'Hora', 7.50),
(7, 'Beauty Forma São Paulo por Entrega', 2, 'Entrega', 18.00),
(8, 'MVC São Paulo por Hora', 5, 'Hora', 8.00),
(9, 'Pró Vida São Paulo por Distância', 1, 'Distancia', 5.50),
(10, 'Bueno Moda São Paulo por Hora', 4, 'Hora', 7.00),
(11, 'Vult São Caetano por Hora', 3, 'Hora', 8.50),
(12, 'Pró-Vida | Retorno 1', 1, 'Entrega', 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`, `nome_usuario`) VALUES
(1, 'Marcelo', 'cbd5262db769a4c0172bb805234e8998', 3, 'Marcelo Bueno'),
(2, 'milene', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Milene'),
(3, 'operador1', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Leonardo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD PRIMARY KEY (`id_anotacao`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cnpj_cliente` (`cnpj_cliente`);

--
-- Índices para tabela `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `fk_id_ordem` (`id_ordem_servico`),
  ADD KEY `fk_id_cliente_entrega` (`id_cliente`),
  ADD KEY `fk_id_motoboy` (`id_motoboy`),
  ADD KEY `fk_id_tabela` (`id_tabela_preco`);

--
-- Índices para tabela `motoboys`
--
ALTER TABLE `motoboys`
  ADD PRIMARY KEY (`id_motoboy`),
  ADD UNIQUE KEY `cpf_motoboy` (`cpf_motoboy`);

--
-- Índices para tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD PRIMARY KEY (`id_ordem`),
  ADD KEY `fk_id_cliente` (`id_cliente`);

--
-- Índices para tabela `retornos`
--
ALTER TABLE `retornos`
  ADD PRIMARY KEY (`id_retorno`),
  ADD KEY `fk_id_entrega` (`id_entrega`),
  ADD KEY `fk_id_tabelapreco` (`id_tabela`);

--
-- Índices para tabela `tabela_preco`
--
ALTER TABLE `tabela_preco`
  ADD PRIMARY KEY (`id_tabela_preco`),
  ADD KEY `fk_id_tabela_cliente` (`id_cliente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  MODIFY `id_anotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `motoboys`
--
ALTER TABLE `motoboys`
  MODIFY `id_motoboy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  MODIFY `id_ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `retornos`
--
ALTER TABLE `retornos`
  MODIFY `id_retorno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tabela_preco`
--
ALTER TABLE `tabela_preco`
  MODIFY `id_tabela_preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
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
