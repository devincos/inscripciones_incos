#**Inscripciones INCOS**
Sistema realizado para la inscripcion de alumnos de acuerdo a la carrera

## INSTALACION
## Paso 1
### Con GIT
Clone el repositorio de git

Con Git HTTPS
```
git clone https://github.com/devincos/inscripciones_incos.git
```

Ingrese al folder del proyecto 
```
cd inscripciones_incos
```


## Paso 2
## Configurar el archivo config.php
Configurar el archivo ``models/config.php``, donde debemos colocar la direccion de donde se encuentra el proyecto de acuerdo al siguiente ejemplo: 

Si mi proyecto esta en ``http://localhost/incos/dev/inscripciones_incos/`` 
entonces debo poner en la variable ``$subcarpetas``, las direccion que esta luego del localhost  ``$subcarpetas = "/incos/dev/sinscripciones_incos/";
``
```
<?php

class Config
{
    public static function baseurl()
    {
        //direccion de las subcarpetas despues de la url ejemplo http://localhost/incos/inscripciones_incos/
        $subcarpetas = "/incos/inscripciones_incos/";
        return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . $subcarpetas;
    }
}

?>
```

## Paso 3

##Configurar la base de datos
si no tenemos la base de datos ``incos_db`` creada entonces debemos de crearla y cargar los script respectivos


Con esos pasos ya tendriamos funcionando nuestro proyecto.

