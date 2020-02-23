<?php

    class plantillaController{
        /****************************************************************/
        //  FUNCIÓN QUE DEVUELVE LA PANTALLA PRINCIPAL DE LA APLICACIÓN
        /****************************************************************/

        public function regresaVistaPlantilla(){
            return include "views/plantilla.php";
        }
    }
?>