CREATE DATABASE pandora

CREATE TABLE IF NOT EXISTS usuarios(
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	login_usuario VARCHAR(50) NOT NULL UNIQUE,
	senha_usuario VARCHAR(50) NOT NULL,
	nivel_acesso INT NOT NULL,
	nome_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS clientes(
	id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_cliente VARCHAR(100) NOT NULL,
	cnpj_cliente VARCHAR(14) NOT NULL UNIQUE,
	email_cliente VARCHAR(100) NOT NULL,
	tel_cliente VARCHAR(11) NOT NULL,
	end_cliente VARCHAR(255) NOT NULL,
	end_num_cliente VARCHAR(100) NOT NULL,
	end_comp_cliente VARCHAR(255) NOT NULL,
	end_bairro_cliente VARCHAR(100) NOT NULL,
	end_cidade_cliente VARCHAR(255) NOT NULL,
	end_estado_cliente VARCHAR(2) NOT NULL,
	end_cep_cliente VARCHAR(8) NOT NULL
);

CREATE TABLE IF NOT EXISTS motoboys(
	id_motoboy INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_motoboy VARCHAR(100) NOT NULL,
	cpf_motoboy VARCHAR(14) NOT NULL UNIQUE,
	email_motoboy VARCHAR(100) NOT NULL,
	tel_motoboy VARCHAR(11) NOT NULL,
	end_motoboy VARCHAR(255) NOT NULL,
	end_num_motoboy VARCHAR(100) NOT NULL,
	end_comp_motoboy VARCHAR(255) NOT NULL,
	end_bairro_motoboy VARCHAR(100) NOT NULL,
	end_cidade_motoboy VARCHAR(255) NOT NULL,
	end_estado_motoboy VARCHAR(2) NOT NULL,
	end_cep_motoboy VARCHAR(8) NOT NULL
);

CREATE TABLE IF NOT EXISTS ordem_servico(
	id_ordem INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	data_os DATE NOT NULL,
	id_cliente INT NOT NULL,
	status_os ENUM('Aberta','Fechada') NOT NULL,
	CONSTRAINT fk_id_cliente FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
);

CREATE TABLE IF NOT EXISTS tabela_preco(
	id_tabela_preco INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_tabela VARCHAR(255) NOT NULL,
	id_cliente INT NOT NULL,
	tipo_cobranca ENUM('Entrega', 'Distancia', 'Hora'),
	valor_cobranca DOUBLE(10,2) NOT NULL,
	CONSTRAINT fk_id_tabela_cliente FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
);

CREATE TABLE IF NOT EXISTS entregas(
	id_entrega INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_ordem_servico INT NOT NULL,
	id_cliente INT NOT NULL,
	id_motoboy INT NOT NULL,
	data_entrega DATE NOT NULL,
	forma_pagamento ENUM('dinheiro', 'cartão') NOT NULL,
	valor_mercadoria DOUBLE(10,2) NOT NULL,
	id_tabela_preco INT NOT NULL,
	status_entrega ENUM('Em aberto', 'Em andamento', 'Entregue', 'Cancelada', 'Retorno') NOT NULL,
	observacoes TEXT NOT NULL,
	CONSTRAINT fk_id_ordem FOREIGN KEY (id_ordem_servico) REFERENCES ordem_servico (id_ordem),
	CONSTRAINT fk_id_cliente_entrega FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente),
	CONSTRAINT fk_id_motoboy FOREIGN KEY (id_motoboy) REFERENCES motoboys (id_motoboy),
	CONSTRAINT fk_id_tabela FOREIGN KEY (id_tabela_preco) REFERENCES tabela_preco (id_tabela_preco)
);

CREATE TABLE IF NOT EXISTS retornos(
	id_retorno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	flag ENUM('Retorno 1', 'Retorno 2', 'Retorno 3', 'Retorno 4', 'Retorno 5'),
	id_entrega INT NOT NULL,
	id_tabela INT NOT NULL,
	status_retorno ENUM('Em aberto', 'Em andamento', 'Entregue', 'Cancelada'),
	CONSTRAINT fk_id_entrega FOREIGN KEY (id_entrega) REFERENCES entregas (id_entrega),
	CONSTRAINT fk_id_tabelapreco FOREIGN KEY (id_tabela) REFERENCES tabela_preco (id_tabela_preco)
);