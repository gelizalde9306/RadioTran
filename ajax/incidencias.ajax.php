
<?php

require_once "../controllers/incidenciasControlador.php";
require_once "../models/incidenciasModel.php";

class AjaxIncidencias{

    public function recuperaIncidencias(){

        $respuestaIncidencias= incidenciasController::recuperaIncidencias();

        echo json_encode($respuestaIncidencias);

	}
}

if(isset($_POST["banderaEstadistica"])){

    $editar = new AjaxIncidencias();
    $editar -> recuperaIncidencias();
    
    }
    
?>