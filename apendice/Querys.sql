//Usuários
INSERT INTO `usuarios`(`id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`) VALUES (DEFAULT,'marcelobueno',md5('darkmia66'),3)

//Motoboys
INSERT INTO `motoboys`(`id_motoboy`, `nome_motoboy`, `cpf_motoboy`, `email_motoboy`, `tel_motoboy`, `end_motoboy`) VALUES 
(DEFAULT,'José da Silva','67856756789','email@exemplo.com.br','978675676','Rua Exemplo 67, Bairro Exemplo, Santo André-SP')

//Clientes
INSERT INTO `clientes`(`id_cliente`, `nome_cliente`, `cnpj_cliente`, `email_cliente`, `tel_cliente`, `end_cliente`) VALUES 
(DEFAULT,'Pró-Vida','56271867000190','exemplo@provida.com.br','89897878','Rua Exemplo 287, Bairro Exemplo, Zona Sul-SP')

//Tabela de preço (Pró-Vida)
INSERT INTO `tabela_preco`(`id_tabela_preco`, `nome_tabela`, `id_cliente`, `tipo_cobranca`, `valor_cobranca`) VALUES 
(DEFAULT,'Pró-Vida ABC',1,'entrega',14.0)

//Ordem de Serviço
INSERT INTO `ordem_servico`(`id_ordem`, `data_os`, `id_cliente`) VALUES 
(DEFAULT,DEFAULT,1)

//Entregas
INSERT INTO `entregas`(`id_entrega`, `id_ordem_servico`, `id_cliente`, `id_motoboy`, `data_entrega`, `forma_pagamento`, `valor_mercadoria`, `id_tabela_preco`) VALUES 
(DEFAULT,1,1,1,DEFAULT,'dinheiro',107.90,1)

//Query busca
SELECT motoboys.nome_motoboy, clientes.nome_cliente, ordem_servico.id_ordem, entregas.id_entrega,
entregas.data_entrega, entregas.forma_pagamento, entregas.valor_mercadoria FROM motoboys, clientes, ordem_servico, entregas
WHERE
motoboys.id_motoboy = entregas.id_motoboy AND
clientes.id_cliente = entregas.id_cliente AND
ordem_servico.id_ordem = entregas.id_ordem_servico

//INSERT entregas
INSERT INTO `entregas`(`id_entrega`, `id_ordem_servico`, `id_cliente`, `id_motoboy`, `data_entrega`, `forma_pagamento`, 
`valor_mercadoria`, `cobranca_extra`, `id_tabela_preco`, `nome_destinatario`, `end_entrega`, `end_num_entrega`, `end_bairro_entrega`, 
`end_cidade_entrega`, `end_estado_entrega`, `end_cep_entrega`, `end_comp_entrega`, `status_entrega`, `observacoes`) 
VALUES (DEFAULT,1,1,2,'2020-11-05','Cartão',109.90,0.0,1,'Cliente Exemplo','Rua Exemplo','600','Bairro Exemplo','Cidade Exemplo','SP','09361000','','Em aberto','')