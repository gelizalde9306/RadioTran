<?php

require_once "../controllers/usuariosControlador.php";
require_once "../models/usuariosModel.php";

class AjaxUsuarios{

	/*=============================================
	FUNCIÓN PARA EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){

        $itemA = "id_usuario";
        $valorA = $this->idUsuario;
        $respuestaUsuarios = usuarioController::mostrarUsuarios($itemA, $valorA);

        echo json_encode($respuestaUsuarios);

	}

	/*=============================================
	FUNCIÓN PARA ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$tabla = "usuarios";
		$item1 = "estatus";
		$valor1 = $this->activarUsuario;

		$item2 = "id_usuario";
		$valor2 = $this->activarId;

		$fecha = date('Y-m-d');
		$hora = date('H:i:S');
		$fechaCompleta = $fecha.' '.$hora;

		$item3 = "fechaModificacion";
		$valor3 = $fechaCompleta;

		$respuesta = ModeloUsuarios::actualizarUsuario($tabla, $item1, $valor1,$item2,$valor2,$item3,$valor3);

	}

	/*=============================================
	FUNCIÓN PARA VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
FUNCIÓN PARA EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
FUNCIÓN PARA ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
FUNCIÓN PARA VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}

?>