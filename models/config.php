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