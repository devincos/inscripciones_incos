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

CREATE TABLE public."formaEvaluacion" (
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
    REFERENCES public."formaEvaluacion"(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;

-------------------------------F-sandra-02-12-2017---------------------------------