CREATE DATABASE mbh;

CREATE TABLE Pessoa(
	codpes SERIAL NOT NULL,
	nompes VARCHAR(80) NOT NULL,
	cpfpes VARCHAR(14) NOT NULL,
	dtanascpes DATE,
	sexpes CHAR(1) CONSTRAINT pes_sexpes_ck CHECK(sexpes IN ('F', 'M'),
	CONSTRAINT pessoa_pk PRIMARY KEY (codpes)
);

CREATE TABLE Email(
	codema SERIAL NOT NULL,
	endema VARCHAR(50) NOT NULL,
	codpes INTEGER NOT NULL,
	CONSTRAINT email_pk PRIMARY KEY (codema),
	CONSTRAINT ema_codpes_fk FOREIGN KEY (codpes) REFERENCES Pessoa (codpes)
);
COMMENT ON COLUMN Email.endema IS 'Endereço do e-mail';

CREATE TABLE Telefone(
	codtel SERIAL NOT NULL,
	aretel INTEGER NOT NULL,
	numtel INTEGER NOT NULL,
	codpes INTEGER NOT NULL,
	CONSTRAINT telefone_pk PRIMARY KEY (codtel),
	CONSTRAINT tel_codpes_fk FOREIGN KEY (codpes) REFERENCES Pessoa (codpes) 
);
COMMENT ON COLUMN Telefone.aretel IS 'Código de área';

CREATE TABLE Endereco(
	codend SERIAL NOT NULL,
	logend VARCHAR(100) NOT NULL,
	numend INTEGER,
	compend VARCHAR(30),
	CONSTRAINT endereco_pk PRIMARY KEY (codend),
);
COMMENT ON COLUMN Endereco.logend IS 'Nome do logradouro (Rua)';
COMMENT ON COLUMN Endereco.compend IS 'Complemente do edereço';

CREATE TABLE Bairro(
	codbar SERIAL NOT NULL,
	nombar VARCHAR(70) NOT NULL,
	CONSTRAINT bairro_pk PRIMARY KEY (codbar)
);

CREATE TABLE Cidade(
	codcid SERIAL NOT NULL,
	nomcid VARCHAR(70) NOT NULL,
	codest INTEGER NOT NULL,
	CONSTRAINT cidade_pk PRIMARY KEY (codcid),
	CONSTRAINT cid_codest_fk FOREIGN KEY (codest) REFERENCES Estado (codest)
);

CREATE TABLE Estado(
	codest SERIAL NOT NULL,
	nomest VARCHAR(50) NOT NULL,
	codpas INTEGER NOT NULL,
	CONSTRAINT estado_pk PRIMARY KEY (codest),
	CONSTRAINT est_codpas_fk FOREIGN KEY (codest) REFERENCES Pais (codpas)
);

CREATE TABLE Pais(
	codpas SERIAL NOT NULL,
	nompas VARCHAR(50) NOT NULL,
	CONSTRAINT pais_pk PRIMARY KEY (codpas)
);

CREATE TABLE Usuario(
	codusu SERIAL NOT NULL,
	logusu VARCHAR(80) NOT NULL,
	senusu varchar(20) NOT NULL,
	CONSTRAINT usuario_pk PRIMARY KEY (codusu)
);

CREATE TABLE Visitante(
	codvis SERIAL NOT NULL,
	codpes INTEGER NOT NULL,
	codusu INTEGER,
	CONSTRAINT visitante_pk PRIMARY KEY (codvis),
	CONSTRAINT vis_codpes_fk FOREIGN KEY (codpes) REFERENCES Pessoa (codpes),
	CONSTRAINT vis_codusu_fk FOREIGN KEY (codusu) REFERENCES Usuario (codusu)
);

CREATE TABLE Instituicao(
	codins SERIAL NOT NULL,
	nomins VARCHAR(80) NOT NULL,
	cnpjins VARCHAR(18) NOT NULL,
	estins VARCHAR(50) NOT NULL,
	CONSTRAINT instituicao_pk PRIMARY KEY (codinst)
);
COMMENT ON COLUMN Instituicao.estins IS 'Estado onde localiza-se a instituição';

CREATE TABLE ProprietarioInstituicao(
	codproins SERIAL NOT NULL,
	nomproins VARCHAR(30) NOT NULL,
	codins INTEGER NOT NULL,
	CONSTRAINT proprietarioinstituicao_fk PRIMARY KEY (codproins),
	CONSTRAINT proins_codins_fk FOREIGN KEY (codins) REFERENCES Instituicao (codins)
);
COMMENT ON COLUMN ProprietarioInstitituicao IS 'Nome do proprietário da instituição';

CREATE TABLE Funcionario(
	codfun SERIAL NOT NULL,
	fncfun VARCHAR(50) NOT NULL,
	slafun NUMERIC(19,2) NOT NULL,
	htbfun TIMESTAMP NOT NULL,
	dtaadmfun DATE NOT NULL,
	codpes INTEGER NOT NULL,
	codins INTEGER NOT NULL,
	codusu INTEGER,
	CONSTRAINT funcionario_pk PRIMARY KEY (codfun),
	CONSTRAINT fun_codpes_fk FOREIGN KEY (codpes) REFERENCES Pessoa (codpes),
	CONSTRAINT fun_codins_fk FOREIGN KEY (codins) REFERENCES Instituicao (codins),
	CONSTRAINT fun_codusu_fk FOREIGN KEY (codusu) REFERENCES Usuario (codusu)
);
COMMENT ON COLUMN Funcionario.htbfun IS 'Horário de trabalho';
COMMENT ON COLUMN Funcionario.dtaadmfun IS 'Data de admissão';
COMMENT ON COLUMN Funcionario.fncfun IS 'Função do Funcionário';

CREATE TABLE Categoria(
	codcat SERIAL NOT NULL,
	nomcat VARCHAR(80) NOT NULL,
	dsccat TEXT,
	CONSTRAINT categoria_pk PRIMARY KEY (codcat)
);

CREATE TABLE Status(
	codsta SERIAL NOT NULL,
	nomsta VARCHAR(20) NOT NULL,
	CONSTRAINT status_pk PRIMARY KEY (codsta)
);
COMMENT ON TABLE Status IS 'Status do objeto em nome do museu';

CREATE TABLE Objeto(
	codobj SERIAL NOT NULL,
	nomobj VARCHAR(50) NOT NULL,
	dscobj TEXT,
	orgobj VARCHAR(255),
	codins INTEGER NOT NULL,
	codcat INTEGER NOT NULL,
	codsta INTEGER NOT NULL,
	CONSTRAINT objeto_pk PRIMARY KEY (codobj),
	CONSTRAINT obj_codins_fk FOREIGN KEY (codins) REFERENCES Instiuicao (codins),
	CONSTRAINT obj_codcat_fk FOREIGN KEY (codcat) REFERENCES Categoria (codcat),
	CONSTRAINT obj_codsta_fk FOREIGN KEY (codsta) REFERENCES Status (codsta)
);

CREATE TABLE Autor(
	codaut SERIAL NOT NULL,
	nomaut VARCHAR(80) NOT NULL,
	bioaut TEXT,
	CONSTRAINT autor_pk PRIMARY KEY (codaut)
);

CREATE TABLE Objeto_Autor(
	codobj SERIAL NOT NULL,
	codaut SERIAL,
	CONSTRAINT objeto_autor_pk PRIMARY KEY (codobj, codaut)
);
