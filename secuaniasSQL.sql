CREATE DATABASE proyecto;
CREATE TABLE tareas(
    id              int(255) auto_increment not null,
    nombreT          varchar(100) not null,
    CONSTRAINT pk_tareas PRIMARY KEY(id)
)ENGINE=InnoDb;
CREATE TABLE categorias(
    id                  int (255) auto_increment not null,
    nombreC           varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY(id),
    CONSTRAINT uq_categoria UNIQUE (nombreC)
)ENGINE=InnoDb;
CREATE TABLE entradas(
    id              int(255) auto_increment not null,
    tarea_id      int(255) not null,
    categoria_id    int(255) not null,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT fk_entrada_tarea FOREIGN KEY(tarea_id) REFERENCES tareas(id),
    CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;
INSERT INTO categorias (nombreC) values("PHP");
INSERT INTO categorias (nombreC) values("Javascript");
INSERT INTO categorias (nombreC) values("Css");