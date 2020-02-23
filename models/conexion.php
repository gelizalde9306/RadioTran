<?php

    class Conexion{

        /*****************************************/
        // FUNCIÓN PARA REALIZAR LA CONEXION A LA BD
        /****************************************/

        static public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=miradio",
                            "root",
                            ""
                            );
            $link->exec("set names utf8");

            return $link;
        }
    }

?>