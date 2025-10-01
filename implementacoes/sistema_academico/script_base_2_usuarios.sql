CREATE TABLE usuarios ( 
  id int AUTO_INCREMENT, 
  nome varchar(70) NOT NULL, 
  login varchar(15) NOT NULL,
  senha varchar(15) NOT NULL,
  img_perfil varchar(100),
  PRIMARY KEY (id) 
);
ALTER TABLE usuarios ADD CONSTRAINT uk_usuarios UNIQUE KEY (login);

/*Inserts usuarios*/
INSERT INTO usuarios (nome, login, senha) VALUES ('Sr. Administrador', 'admin', 'admin');
INSERT INTO usuarios (nome, login, senha) VALUES ('Sr. Root', 'root', 'root');