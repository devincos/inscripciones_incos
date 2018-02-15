-------------------------------------I-sandra-01-03-02-2018--------------------------------------
--------------- SQL ---------------

ALTER TABLE public.materia
  ADD CONSTRAINT materia_fk FOREIGN KEY (id_carrera)
    REFERENCES public.carrera(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
-------------------------------F-sandra-01-03-02-2018---------------------------------

    ------------------------------I-ariel-01-09-02-2018-------------------------------------
        --------------- SQL ---------------

ALTER TABLE public.asignacion
  ADD CONSTRAINT asignacion_fk2 FOREIGN KEY (id_materia)
    REFERENCES public.materia(id_materia)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
    ------------------------------F-ariel-01-09-02-2018-------------------------------------

    ------------------------------I-ariel-01-12-02-2018-------------------------------------
  
    --------------- SQL ---------------
ALTER TABLE public.carrera
ADD CONSTRAINT carrera_fk FOREIGN KEY (id_modalidad)
    REFERENCES public.modalidad(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
ADD CONSTRAINT carrera_fk1 FOREIGN KEY (id_formacion_carr)
    REFERENCES public.forma_evaluacion(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE


    ------------------------------F-ariel-01-12-02-2018-------------------------------------