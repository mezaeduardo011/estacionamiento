
CREATE TABLE ho_conexiones (
  id int Identity(1,1) NOT NULL,
  label varchar(20) NOT NULL,
  driver varchar(30) NOT NULL,
  host varchar(20) NOT NULL,
  db varchar(30) NOT NULL,
  usuario varchar(15) NOT NULL,
  clave varchar(50) NOT NULL,
  CONSTRAINT pk_ho_conexiones PRIMARY KEY(id)
);

ALTER TABLE ho_conexiones
  ADD UNIQUE (label)

-- Entidades registro de entidd
CREATE TABLE ho_entidades (
  id int Identity(1,1) NOT NULL,
  conexiones_id int NOT NULL,
  tabla varchar(64) NOT NULL,
  field varchar(100) NOT NULL,
  type varchar(20) NOT NULL,
  required varchar(10) NOT NULL,
  dimension int,
  restrincion varchar(10),
  CONSTRAINT pk_ho_entidades PRIMARY KEY(id)
);
ALTER TABLE ho_entidades
  ADD UNIQUE (conexiones_id,tabla,field)


CREATE TABLE ho_vistas (
  id int Identity(1,1),
  conexiones_id int NOT NULL,
  entidades_tabla varchar(64) NOT NULL,
  nombre varchar(64) NOT NULL,
  field varchar(64) NOT NULL,
  type varchar(14) NOT NULL,
  label varchar(14) NOT NULL,
  place_holder varchar(14),
  required bit,
  related varchar(100),
  relacionado bit,
  vista_campo varchar(10),
  orden int,
  hidden_form bit ,
  hidden_list bit ,
  CONSTRAINT pk_ho_vistas PRIMARY KEY(id)
);

--ALTER TABLE ho_vistas
 -- ADD UNIQUE (entidades_tabla, nombre,)


-- Vista encargada de extraer las tablas
SELECT a.*, (SELECT COUNT(b.TABLE_NAME) from test_crud.INFORMATION_SCHEMA.COLUMNS AS b WHERE b.TABLE_NAME = a.TABLE_NAME) AS columas from test_crud.INFORMATION_SCHEMA.TABLES AS a WHERE a.TABLE_NAME not like 'ho_%' AND a.TABLE_TYPE='BASE TABLE' AND a.TABLE_NAME not like 'seg%'



