-- ##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--## --
-- ##                                                                  ## --
-- ## Projeto SysGAE - Sistema de Gerenciamento Administrativo Escolar ## --
-- ##                                                                  ## --
-- ##                                                                  ## --
-- ## Autor: Paulo Ricardo Almeida da Silva                            ## --
-- ##                                                                  ## --
-- ## Descrição:                                                       ## --
-- ##     Este banco de dados contempla os dados básicos de cada cate- ## --
-- ##     goria.                                                       ## --
-- ##                                                                  ## --
-- ##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--## --


-- Cria o banco de dados SYSGAE caso o mesmo não exista
CREATE DATABASE IF NOT EXISTS sysgae;

-- Habilita o banco de dados SYSGAE
USE sysgae;


CREATE TABLE Aluno (
    alu_codigo int PRIMARY KEY AUTO_INCREMENT,
    alu_nome varchar(100),
    alu_nascimento DATE,
    alu_sexo CHAR(1),
    alu_certidao VARCHAR(40),
    alu_rg varchar(15),
    alu_cpf varchar(15),
    alu_mae varchar(100),
    alu_pai varchar(100),
    alu_rua varchar(100),
    alu_bairro varchar(50),
    alu_cidade varchar(50),
    alu_cep varchar(10),
    alu_uf char(12),
    alu_telefone varchar(15),
    alu_email varchar(50),
    fk_esc_codigo int
);

CREATE TABLE Funcionario (
    fun_codigo int PRIMARY KEY AUTO_INCREMENT,
    fun_nome varchar(100),
    fun_nascimento DATE,
    fun_sexo CHAR(1),
    fun_certidao VARCHAR(40),
    fun_rg varchar(15),
    fun_cpf varchar(15),
    fun_mae varchar(100),
    fun_pai varchar(100),
    fun_rua varchar(100),
    fun_bairro varchar(50),
    fun_cidade varchar(50),
    fun_cep varchar(10),
    fun_uf char(2),    
    fun_telefone varchar(15),
    fun_email varchar(50),
    fun_senha varchar(255),
    fun_status CHAR(1),
    fun_nivel CHAR(1),
    fk_crg_codigo int,
    fk_esc_codigo int
);

CREATE TABLE Cargo (
    crg_codigo int PRIMARY KEY AUTO_INCREMENT,
    crg_nome varchar(50),
    crg_descricao text
);

CREATE TABLE Escola (
    esc_codigo int PRIMARY KEY AUTO_INCREMENT,
    esc_nome varchar(100),
    esc_bairro varchar(50),
    esc_cidade varchar(50),
    esc_cep varchar(10),
    esc_uf char(2),
    esc_rua varchar(100),
    esc_telefone varchar(15),
    esc_email varchar(50)
);

CREATE TABLE matricula (
    mtr_codigo int PRIMARY KEY AUTO_INCREMENT,
    mtr_serie varchar(50),
    mtr_ano char(4),
    mtr_status varchar(25),
    fk_alu_codigo int,
    fk_tur_codigo int
);

CREATE TABLE turma (
    tur_codigo int PRIMARY KEY AUTO_INCREMENT,
    tur_nome varchar(25),
    tur_periodo varchar(15),
    fk_fun_codigo int
);

CREATE TABLE disciplina (
    dis_codigo int PRIMARY KEY AUTO_INCREMENT,
    dis_componente varchar(25)
);

CREATE TABLE boletim (
    bol_codigo int PRIMARY KEY AUTO_INCREMENT,
    bol_n1 float,
    bol_f1 int,
    bol_n2 float,
    bol_f2 int,
    bol_n3 float,
    bol_f3 int,
    bol_n4 float,
    bol_f4 int,
    fk_dis_codigo int
);

CREATE TABLE Acesso (
    acs_codigo INT PRIMARY KEY AUTO_INCREMENT,
    acs_usuario VARCHAR(20),
    acs_data DATETIME
);

CREATE TABLE contem (
    fk_dis_codigo int,
    fk_tur_codigo int
);
 
ALTER TABLE Aluno ADD CONSTRAINT FK_Aluno_2
    FOREIGN KEY (fk_esc_codigo)
    REFERENCES Escola (esc_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_2
    FOREIGN KEY (fk_crg_codigo)
    REFERENCES Cargo (crg_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_3
    FOREIGN KEY (fk_esc_codigo)
    REFERENCES Escola (esc_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE matricula ADD CONSTRAINT FK_matricula_2
    FOREIGN KEY (fk_alu_codigo)
    REFERENCES Aluno (alu_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE matricula ADD CONSTRAINT FK_matricula_3
    FOREIGN KEY (fk_tur_codigo)
    REFERENCES turma (tur_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE turma ADD CONSTRAINT FK_turma_2
    FOREIGN KEY (fk_fun_codigo)
    REFERENCES Funcionario (fun_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE boletim ADD CONSTRAINT FK_boletim_2
    FOREIGN KEY (fk_dis_codigo)
    REFERENCES disciplina (dis_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE contem ADD CONSTRAINT FK_contem_1
    FOREIGN KEY (fk_dis_codigo)
    REFERENCES disciplina (dis_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE contem ADD CONSTRAINT FK_contem_2
    FOREIGN KEY (fk_tur_codigo)
    REFERENCES turma (tur_codigo)
    ON DELETE SET NULL;