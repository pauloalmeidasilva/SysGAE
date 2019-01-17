/* Modelo-Logico-Alternativo: */

CREATE TABLE Aluno (
    alu_codigo INT PRIMARY KEY AUTO_INCREMENT,
    alu_nome VARCHAR(50) NOT NULL,
    alu_nascimento DATE NOT NULL,
    alu_sexo CHAR(1) NOT NULL,
    alu_certidao VARCHAR(40) NOT NULL,
    alu_rg VARCHAR(15),
    alu_cpf VARCHAR(15),
    alu_mae VARCHAR(50) NOT NULL,
    alu_pai VARCHAR(50),
    alu_telefone VARCHAR(15),
    alu_email VARCHAR(40),
    FK_esc_codigo INT,
    FK_end_codigo INT
);

CREATE TABLE Funcionario (
    fun_codigo INT PRIMARY KEY AUTO_INCREMENT,
    fun_nome VARCHAR(50) NOT NULL,
    fun_nascimento DATE NOT NULL,
    fun_sexo CHAR(1) NOT NULL,
    FUN_certidao VARCHAR(40) NOT NULL,
    fun_rg VARCHAR(15),
    fun_cpf VARCHAR(15),
    fun_mae VARCHAR(50) NOT NULL,
    fun_pai VARCHAR(50),
    fun_telefone VARCHAR(15),
    fun_email VARCHAR(40),
    fun_senha VARCHAR(255),
    fun_nivel CHAR(1),
    fun_status CHAR(1),
    FK_crg_codigo INT,
    FK_esc_codigo INT,
    FK_end_codigo INT
);

CREATE TABLE Cargo (
    crg_codigo INT PRIMARY KEY AUTO_INCREMENT,
    crg_nome VARCHAR(50) NOT NULL,
    crg_descricao VARCHAR(255)
);

CREATE TABLE Escola (
    esc_codigo INT PRIMARY KEY AUTO_INCREMENT,
    esc_nome VARCHAR(50) NOT NULL,
    esc_telefone VARCHAR(15),
    esc_email VARCHAR(40),
    FK_end_codigo INT
);

CREATE TABLE Matricula (
    mtr_codigo INT PRIMARY KEY AUTO_INCREMENT,
    mtr_serie VARCHAR(50) NOT NULL,
    mtr_ano DATE,
    FK_alu_codigo INT,
    FK_tur_codigo INT
);

CREATE TABLE Turma (
    tur_codigo INT PRIMARY KEY AUTO_INCREMENT,
    tur_nome VARCHAR(50) NOT NULL,
    tur_periodo varchar(20) NOT NULL,
    FK_fun_codigo INT
);

CREATE TABLE Disciplina (
    dis_codigo INT PRIMARY KEY AUTO_INCREMENT,
    dis_componente VARCHAR(50) NOT NULL
);

CREATE TABLE Boletim (
    bol_codigo INT PRIMARY KEY AUTO_INCREMENT,
    bol_n1 FLOAT,
    bol_f1 INT,
    bol_n2 FLOAT,
    bol_f2 INT,
    bol_n3 FLOAT,
    bol_f3 INT,
    bol_n4 FLOAT,
    bol_f4 INT,
    FK_dis_codigo INT
);

CREATE TABLE Endereco (
    end_codigo INT PRIMARY KEY AUTO_INCREMENT,
    end_rua VARCHAR(40) NOT NULL,
    end_bairro VARCHAR(40) NOT NULL,
    end_numero VARCHAR(10) NOT NULL,
    end_complemento VARCHAR(40),
    end_cidade VARCHAR(40) NOT NULL,
    end_cep VARCHAR(10) NOT NULL,
    end_uf CHAR(2) NOT NULL
);

CREATE TABLE Acesso (
    acs_codigo INT PRIMARY KEY AUTO_INCREMENT,
    acs_usuario VARCHAR(20) NOT NULL,
    acs_data DATETIME NOT NULL
);

CREATE TABLE Contem (
    FK_dis_codigo INT,
    FK_tur_codigo INT
);
 
ALTER TABLE Aluno ADD CONSTRAINT FK_Aluno_2
    FOREIGN KEY (FK_esc_codigo)
    REFERENCES Escola (esc_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE Aluno ADD CONSTRAINT FK_Aluno_3
    FOREIGN KEY (FK_end_codigo)
    REFERENCES Endereco (end_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_2
    FOREIGN KEY (FK_crg_codigo)
    REFERENCES Cargo (crg_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_3
    FOREIGN KEY (FK_esc_codigo)
    REFERENCES Escola (esc_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_4
    FOREIGN KEY (FK_end_codigo)
    REFERENCES Endereco (end_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Escola ADD CONSTRAINT FK_Escola_2
    FOREIGN KEY (FK_end_codigo)
    REFERENCES Endereco (end_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Matricula ADD CONSTRAINT FK_Matricula_2
    FOREIGN KEY (FK_alu_codigo)
    REFERENCES Aluno (alu_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Matricula ADD CONSTRAINT FK_Matricula_3
    FOREIGN KEY (FK_tur_codigo)
    REFERENCES Turma (tur_codigo)
    ON DELETE CASCADE;
 
ALTER TABLE Turma ADD CONSTRAINT FK_Turma_2
    FOREIGN KEY (FK_fun_codigo)
    REFERENCES Funcionario (fun_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE Boletim ADD CONSTRAINT FK_Boletim_2
    FOREIGN KEY (FK_dis_codigo)
    REFERENCES Disciplina (dis_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE Contem ADD CONSTRAINT FK_contem_1
    FOREIGN KEY (FK_dis_codigo)
    REFERENCES Disciplina (dis_codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE Contem ADD CONSTRAINT FK_contem_2
    FOREIGN KEY (FK_tur_codigo)
    REFERENCES Turma (tur_codigo)
    ON DELETE SET NULL;