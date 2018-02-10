-------------------------------------I-eli-02-12-2017--------------------------------------

--------------- SQL ---------------

CREATE TABLE public.carrera (
  id SERIAL NOT NULL UNIQUE,
  nombre VARCHAR(50),
  id_modalidad INTEGER,
  id_formacion_carr INTEGER,
  duracion INTEGER,
  fecha_creacion DATE,
  carga_horaria INTEGER,
  fecha_reg TIMESTAMP WITHOUT TIME ZONE
) 
WITH (oids = false);
--------------- SQL ---------------

ALTER TABLE public.carrera
  DROP CONSTRAINT carrera_id_key RESTRICT;

ALTER TABLE public.carrera
  ADD PRIMARY KEY (id);

--------------- SQL ---------------

CREATE TABLE public.modalidad (
  id SERIAL,
  modalidad VARCHAR(50)
) 
WITH (oids = false);

--------------- SQL ---------------

ALTER TABLE public.modalidad
  ADD PRIMARY KEY (id);
--------------- SQL ---------------

CREATE TABLE public."forma_evaluacion" (
  id SERIAL NOT NULL,
  evaluacion VARCHAR(30),
  PRIMARY KEY(id)
) 
WITH (oids = false);
---------------------------------F-eli-02-12-2017--------------------------------------

------------------------------I-sandra-02-12-2017-------------------------------------
--------------- SQL ---------------

ALTER TABLE public.carrera
  ADD CONSTRAINT carrera_fk FOREIGN KEY (id_modalidad)
    REFERENCES public.modalidad(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
    
    --------------- SQL ---------------

ALTER TABLE public.carrera
  ADD CONSTRAINT carrera_fk1 FOREIGN KEY (id_formacion_carr)
    REFERENCES public."forma_evaluacion"(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
-------------------------------F-sandra-02-12-2017---------------------------------

------------------------------I-sandra-01-03-02-2018-------------------------------------
--------------- SQL ---------------

CREATE TABLE public.materia (
  id_materia SERIAL NOT NULL,
  nom_materia VARCHAR(50) NOT NULL,
  nro_hrs INTEGER,
  anio_materia INTEGER,CREATE TABLE public.asignacion_new (
  id_inscripcion INTEGER NOT NULL,
  ci CHAR(15) NOT NULL,
  id_materia INTEGER NOT NULL,
  nota1 SMALLINT,
  nota2 SMALLINT,
  CONSTRAINT asignacion_new_fk FOREIGN KEY (id_inscripcion)
    REFERENCES public.inscripcion(id_inscripcion)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT asignacion_new_fk1 FOREIGN KEY (ci)
    REFERENCES public.estudiante(ci)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
) 
WITH (oids = false);

  id_carrera INTEGER NOT NULL,
  PRIMARY KEY(id_materia)
) 
WITH (oids = false);
-------------------------------F-sandra-01-03-02-2018---------------------------------
------------------------------I-sandra-02-03-02-2018-------------------------------------
--------------- SQL ---------------

CREATE TABLE public.estudiante (
  id_estudiante SERIAL NOT NULL,
  ci INTEGER NOT NULL,
  nom_estudiante CHAR(30),
  apell_paterno CHAR(30) NOT NULL,
  apell_materno CHAR(30),
  sexo CHAR(10),
  fecha_nac DATE,
  direccion CHAR(30),
  telefono INTEGER,
  colegio_egreso CHAR(30),
  carr_estudiante CHAR(30),
  anio_cursa INTEGER,
  paralelo CHAR(1) NOT NULL,
  PRIMARY KEY(id_estudiante)
) 
WITH (oids = false);
-------------------------------F-sandra-02-03-02-2018---------------------------------
------------------------------I-sandra-02-03-02-2018-------------------------------------
--------------- SQL ---------------

ALTER TABLE public.estudiante
  ADD COLUMN id_materia INTEGER NOT NULL;
-------------------------------F-sandra-02-03-02-2018---------------------------------
------------------------------I-ariel-01-09-02-2018-------------------------------------


CREATE TABLE public.asignacion (
  id_inscripcion INTEGER NOT NULL,
  ci CHAR(15) NOT NULL,
  id_materia INTEGER NOT NULL,
  nota1 SMALLINT,
  nota2 SMALLINT,
  CONSTRAINT asignacion_fk FOREIGN KEY (id_inscripcion)
    REFERENCES public.inscripcion(id_inscripcion)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT asignacion_fk1 FOREIGN KEY (ci)
    REFERENCES public.estudiante(ci)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
) 
WITH (oids = false);

CREATE TABLE public.estudiante (
  ci CHAR(15) NOT NULL,
  nom_estudiante CHAR(30) NOT NULL,
  apell_paterno CHAR(30),
  apell_materno CHAR(30),
  sexo CHAR(10) NOT NULL,
  fecha_nac DATE NOT NULL,
  direccion CHAR(30),
  telefono INTEGER,
  colegio_egreso CHAR(30) NOT NULL,
  CONSTRAINT estudiante_pkey PRIMARY KEY(ci)
) 
WITH (oids = false);

CREATE TABLE public.inscripcion (
  id_inscripcion SERIAL,
  ci CHAR(15) NOT NULL,
  id_carrera INTEGER NOT NULL,
  anio SMALLINT NOT NULL,
  paralelo CHAR(1) NOT NULL,
  CONSTRAINT inscripcion_pkey PRIMARY KEY(id_inscripcion),
  CONSTRAINT inscripcion_fk FOREIGN KEY (ci)
    REFERENCES public.estudiante(ci)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT inscripcion_fk1 FOREIGN KEY (id_carrera)
    REFERENCES public.carrera(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
) 
WITH (oids = false);
-------------------------------F-ariel-01-09-02-2018---------------------------------
