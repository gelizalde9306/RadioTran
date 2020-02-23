<?php
   require_once "controllers/plantillaControlador.php";
   require_once "controllers/estacionesControlador.php";
   require_once "controllers/usuariosControlador.php";

   require_once "models/estacionesModel.php";
   require_once "models/usuariosModel.php";


   $plantillaController = new plantillaController();
   $plantillaController -> regresaVistaPlantilla();
    
?>