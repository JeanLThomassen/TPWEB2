create table temporadas (
  id bigint primary key generated always as identity,
  numero int not null,
  titulo text
);

create table capitulos (
  id bigint primary key generated always as identity,
  titulo text not null,
  temporada_id bigint references temporadas (id)
);

create table personajes (
  id bigint primary key generated always as identity,
  nombre text not null
);

create table personajesporcapitulo (
  id bigint primary key generated always as identity,
  capitulo_id bigint references capitulos (id),
  personaje_id bigint references personajes (id)
);