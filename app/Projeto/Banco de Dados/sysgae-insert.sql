INSERT INTO endereco (
	end_rua,
	end_numero,
	end_complemento,
    end_bairro,
    end_cidade,
    end_cep,
    end_uf)
VALUES
	('Rua Tadeu Rangel Pestana', '506', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Iracema Amadi', '312', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Pereira Barreto', '207', 'Fundos', 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Rua Miguel Pereira', '347', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Brigadeiro Jordão', '1100', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Avenida Sabiá', '500', 'Casa 2', 'Vila Santo Antonio', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Bem te vi', '37', NULL, 'Vila Santo Antonio', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Canario', '106', NULL, 'Vila Santo Antonio', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Arara', '299', NULL, 'Vila Santo Antonio', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Ana Maria da Costa', '506', NULL, 'Vila Albertina', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Santa Clara', '63', NULL, 'Vila Albertina', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Sagrada Familia', '115', NULL, 'Vila Albertina', 'Campos do Jordao', '12460-000', 'SP'),
	('Avenida Tassaburo Yamaguchi', '1876', NULL, 'Vila Albertina', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Olivia Correa de Oliveira', '456', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Anita Correa de Oliveira', '400', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Julio Graciliano Recanto', '392', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Joao Inacio Bicudo', '477', NULL, 'Vila Paulista Popular', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Amancio Mazaropi', '279', NULL, 'Vila Paulista Popular', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Avenida Escocia', '897', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP'),
	('Rua Jose Vivaldo dos Reis', '506', NULL, 'Vila Abernessia', 'Campos do Jordao', '12460-000', 'SP');

INSERT INTO escola (
	esc_nome,
	esc_telefone,
	esc_email,
	FK_end_codigo)
VALUES
	('EM Amadeu Carletti Junior','(12) 3662-1885',NULL,3),
	('EM Dr. Antonio Nicola Padula',NULL,NULL,4),
	('EM Prof. Cecilia de Almeida Leite Murayama','(12) 3663-6000',NULL,9),
	('EM Prof. Mary Aparecida Ribeiro de Arruda Camargo','(12) 3664-3000',NULL,15);


INSERT INTO aluno (
	alu_nome,
	alu_nascimento,
	alu_sexo,
	alu_certidao,
	alu_rg,
	alu_cpf,
	alu_mae,
	alu_pai,
	alu_telefone,
	alu_email,
	FK_esc_codigo,
	FK_end_codigo)
VALUES
	('Tomas Nathan Leonardo Caldeira',22/04/2013,'M','23925801552016144408791167078311','19.639.002-3','100.073.398-01','Clarice Nina','Carlos Mário Kaique Caldeira','(12) 98835-5524','tomasnathan77@email.com.br',1,16),
	('Priscila Sophia Baptista',11/04/2012,'M','22822601552010164812189136172527','39.012.737-1','879.181.358-14','Catarina Sarah Lavínia','Filipe Enzo Baptista','(12) 99132-5754','priscilasophiabaptista-72@novotempo.com',2,14),
	('Luís Márcio Juan Sales',08/05/2009,'M','241877 01 55 2013 1 17491 752 5717383-51','34.648.989-1','052.129.108-97','Joana Rafaela','César André Leandro Sales','(12) 98988-7494','luismarciojuansales_@mmetalica.com.br',3,18),
	('Joana Andrea Helena Novaes',03/09/2011,'M','157199 01 55 2014 1 80923 168 732993-18','38.633.071-2','904.873.078-36','Alice Ayla','Igor Juan Carlos Eduardo Novaes','(12) 99990-4595','joanaandreahelenanovaes-88@corp.globo.com',4,7),
	('Alexandre Kaique Lopes',11/04/2012,'M','229993 01 55 2017 1 29597 815 848459-30','39.012.737-1','408.131.368-73','Catarina Sarah Lavínia','Filipe Enzo Baptista','(12) 99132-5754','priscilasophiabaptista-72@novotempo.com',1,9),
	('Milena Ayla Sandra Moraes',21/07/2012,'M','203251 01 55 2019 1 33257 460 6037094-10',NULL,NULL,'Catarina Sarah Lavínia',NULL,'(12) 99133-5754',NULL,2,10),
	('Daniel Cauã da Rosa',19/09/2010,'M','192276 01 55 2014 1 39842 317 1691153-10','13.739.675-2','206.630.551-05','Pietra Rafaela','Augusto Pietro João da Rosa','(92) 98190-4310','danielcauadarosa..danielcauadarosa@cedda.com.br',3,19);

INSERT INTO cargo (
	crg_nome,
	crg_descricao)
VALUES
	('Diretor de Escola',NULL),
	('Coordenador de Escola',NULL),
	('Secretario de Escola',NULL),
	('Auxiliar de Secretaria',NULL),
	('Cozinheiro',NULL),
	('Merendeiro',NULL),
	('Faxineiro',NULL),
	('Professor de Ensino Fundamental',NULL),
	('Zelador',NULL),
	('Carpinteiro',NULL);