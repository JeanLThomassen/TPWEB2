CREATE TABLE temporadas (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  numero INT NOT NULL,
  titulo TEXT
);

CREATE TABLE capitulos (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  titulo TEXT NOT NULL,
  temporada_id BIGINT,
  FOREIGN KEY (temporada_id) REFERENCES temporadas(id)
);

CREATE TABLE personajes (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  nombre TEXT NOT NULL
);

CREATE TABLE personajesporcapitulo (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  capitulo_id BIGINT,
  personaje_id BIGINT,
  FOREIGN KEY (capitulo_id) REFERENCES capitulos(id),
  FOREIGN KEY (personaje_id) REFERENCES personajes(id)
);
