/* Tabela disciplinas */
CREATE TABLE disciplinas ( 
  id int NOT NULL AUTO_INCREMENT, 
  codigo varchar(3) NOT NULL, /* Abreviatura de 3 letras da disciplina. Ex.: BDO */
  nome varchar(50) NOT NULL, /* Nome da disciplina. Ex.: Banco de Dados */
  id_curso int NOT NULL, /* Curso de oferta da disciplina */
  CONSTRAINT pk_disciplinas PRIMARY KEY (id) 
);
ALTER TABLE disciplinas ADD CONSTRAINT fk_curso2 FOREIGN KEY (id_curso) REFERENCES cursos (id);

INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('BDO', 'Banco de Dados', 1);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('LPW', 'Linguagem de Programação para Web', 1);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('DEW', 'Desenvolvimento Web', 1);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('DW1', 'Desenvolvimento Web 1', 2);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('DW1', 'Desenvolvimento Web 2', 2);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('IFS', 'Informática e Sociedade', 2);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('TEC', 'Teoria da Computação', 3);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('MAD', 'Matemática Discreta', 3);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('AGL', 'Álgebra Linear', 3);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('TGS', 'Teoria Geral de Sistemas', 4);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('SO', 'Sistemas Operacionais', 4);
INSERT INTO disciplinas (codigo, nome, id_curso) VALUES ('MDS', 'Modelagem de Sistemas', 4);

/* Tabela turmas */
CREATE TABLE turmas ( 
  id int NOT NULL AUTO_INCREMENT, 
  ano int NOT NULL, /* Ano de oferta da turma */
  id_disciplina int NOT NULL, /* Disciplina de oferta da turma */
  CONSTRAINT pk_turmas PRIMARY KEY (id) 
);
ALTER TABLE turmas ADD CONSTRAINT fk_disciplina FOREIGN KEY (id_disciplina) REFERENCES disciplinas (id);