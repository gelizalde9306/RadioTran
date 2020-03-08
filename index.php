<?php
   require_once "controllers/plantillaControlador.php";
   require_once "controllers/estacionesControlador.php";
   require_once "controllers/usuariosControlador.php";
   require_once "controllers/incidenciasControlador.php";

   require_once "models/estacionesModel.php";
   require_once "models/usuariosModel.php";
   require_once "models/incidenciasModel.php";

   $plantillaController = new plantillaController();
   $plantillaController -> regresaVistaPlantilla();
    
?>