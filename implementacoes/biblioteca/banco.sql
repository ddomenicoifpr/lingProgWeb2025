CREATE TABLE livros (
    id INTEGER NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL,
    /* D=Drama, F=Ficção, R=Romance, O=Outro */
    genero VARCHAR(1) NOT NULL,
    qtd_paginas INTEGER NOT NULL,
    CONSTRAINT pk_livros PRIMARY KEY (id)
);

ALTER TABLE livros ADD COLUMN autor VARCHAR(50);
UPDATE livros SET autor = 'Não informado' WHERE autor IS NULL;