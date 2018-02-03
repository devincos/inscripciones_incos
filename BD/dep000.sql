-------------------------------------I-sandra-01-03-02-2018--------------------------------------
--------------- SQL ---------------

ALTER TABLE public.materia
  ADD CONSTRAINT materia_fk FOREIGN KEY (id_carrera)
    REFERENCES public.carrera(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
-------------------------------F-sandra-01-03-02-2018---------------------------------