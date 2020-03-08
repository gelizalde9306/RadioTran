<?php
    class usuarioController{

        /*************************************************/
        //  FUNCIÓN QUE VÁLIDA EL ACCESO A LA APLICACION
        /*************************************************/
       static  public function validaIngresoUsuario(){
           if(isset($_POST["email"]) && isset($_POST["password"])  ){
                $tabla = 'usuarios';
                $itemA = 'correo';
                $valorA = $_POST["email"];
                $valorB = $_POST["password"];
                $encripta = crypt($_POST["password"], '$2a$07$usesomesillystringforsalt$');
                $respuesta = ModeloUsuarios::MostrarUsuarios($tabla, $itemA, $valorA);

                if (is_bool($respuesta)){
                    echo '<br/><div class="alert alert-danger">El usuario no existe, favor de verificar sus datos ingresados</div>';
                }else{
                    if ($respuesta["correo"] == $valorA && $respuesta["contrasenia"] ==   $encripta ){
                       
                        if($respuesta["estatus"]==1){
                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION["foto"] = $respuesta["foto"] ;
                            $_SESSION["correo"] = $respuesta["correo"];
                            $_SESSION["id"] = $respuesta["id_usuario"];
                        echo '<script>
                                    window.location = "inicio";
                                </script>';
                        }else{
                            echo '<br/><div class="alert alert-danger">La cuenta se encuentra inactiva</div>';
                 
                        }
                   
                    }else{
                        echo '<br/><div class="alert alert-danger">El usuario no existe, favor de verificar sus datos ingresados</div>';
                    }
                }
           }
        }
        
        /*************************************************/
        //  FUNCIÓN QUE GUARDA EL REGISTRO DE USUARIOS
        /*************************************************/

        static  public function guardaUsuarioNormal(){
            if (isset($_POST["nuevoCorreo"])){
                $tabla = 'usuarios';
                $itemA = 'correo';
                $valorA = $_POST["nuevoCorreo"];
                
                $respuesta =  ModeloUsuarios::MostrarUsuarios($tabla, $itemA, $valorA);
                if (is_bool($respuesta)){
                    if(isset($_FILES["nuevaFotoUsuario"]["tmp_name"])){
                        list($ancho, $alto) = getimagesize($_FILES["nuevaFotoUsuario"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;
                        $identificador = gmdate('Ymdhis', time());

                        $directorio = "views/img/usuarios/$identificador";

                        mkdir($directorio, 0755);
                        
                        if($_FILES["nuevaFotoUsuario"]["type"] == "image/jpeg"){

                            //GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = $directorio."/".$aleatorio.".jpg";
    
                            $origen = imagecreatefromjpeg($_FILES["nuevaFotoUsuario"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagejpeg($destino, $ruta);
    
                        }
    
                        if($_FILES["nuevaFotoUsuario"]["type"] == "image/png"){
    
                            //GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = $directorio."/".$aleatorio.".png";
    
                            $origen = imagecreatefrompng($_FILES["nuevaFotoUsuario"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagepng($destino, $ruta);
    
                        }


                    }
                    $encripta = crypt($_POST["nuevoContrasenia"], '$2a$07$usesomesillystringforsalt$');
                     
                    
                    
                    $datos = array(
                        "correo" => $_POST["nuevoCorreo"],
                        "contrasenia" => $encripta,
                        "foto" => $ruta,
                        "perfil" => '2',
                        "estatus" => '1'
                    );
                    
                    $respuesta = ModeloUsuarios::RegistrarUsuarios($tabla, $datos);

                     if($respuesta == 'ok'){

                        echo "<script>

                        Swal.fire(
                            'OK!',
                            'Se registro correctamente el usuario!',
                            'success'
                        ).then((result) => {
                            if(result.value){
                            
                                window.location = 'listarUsuarios';
                            }
                        });

                        </script>";

                     }else{
                        echo "<script>
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Ocurrio un error al crear el usuario!',
                        }).then((result) => {
                            if(result.value){
                                window.location = 'listarUsuarios';
                            }
                        });
                    
                        </script>";

                    }



                }else{
                    echo "<script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'La cuenta de correo ya existe en el sistema, favor de validar!',
                    }).then((result) => {
                        if(result.value){
						    window.location = 'listarUsuarios';
                        }
                    });
                
                    </script>";   
                }
            }
        }

        /***************************************************************/
        //  FUNCIÓN QUE GUARDA EL REGISTRO DE USUARIOS ADMINISTRADORES
        /***************************************************************/

        static public function  crearUsuarioAdmin(){
            if(isset($_POST["newEmail"])){

                $tabla = 'usuarios';
                $itemA = 'correo';
                $valorA = $_POST["newEmail"];

                $respuesta =  ModeloUsuarios::MostrarUsuarios($tabla, $itemA, $valorA);
                
                if (is_bool($respuesta)){

                    if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                        list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
    
                        $nuevoAncho = 500;
                        $nuevoAlto = 500;
                        $identificador = gmdate('Ymdhis', time());

                        $directorio = "views/img/usuarios/$identificador";
    
                        /*=============================================
                        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                        =============================================*/
    
                       // $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
    
                        mkdir($directorio, 0755);
    
                        /*=============================================
                        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                        =============================================*/
    
                        if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
    
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = $directorio."/".$aleatorio.".jpg";
    
                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagejpeg($destino, $ruta);
    
                        }
    
                        if($_FILES["nuevaFoto"]["type"] == "image/png"){
    
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = $directorio."/".$aleatorio.".jpg";
    
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagepng($destino, $ruta);
    
                        }
    
                    }

                    $tabla = "usuarios";

                    $encriptar = crypt($_POST["newPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    
                    $datos = array(
                        "correo" => $_POST["newEmail"],
                        "contrasenia" => $encripta,
                        "foto" => $ruta,
                        "perfil" => '1',
                        "estatus" => '1'
                    );


                    $respuesta = ModeloUsuarios::RegistrarUsuarios($tabla, $datos);

                    if($respuesta == 'ok'){

                        echo "<script>

                        Swal.fire(
                            'OK!',
                            'Se registro correctamente el usuario!',
                            'success'
                        ).then((result) => {
                            if(result.value){
                            
                                window.location = 'listarUsuarios';
                            }
                        });

                        </script>";

                     }else{
                        echo "<script>
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Ocurrio un error al crear el usuario!',
                        }).then((result) => {
                            if(result.value){
                                window.location = 'listarUsuarios';
                            }
                        });
                    
                        </script>";

                    }

                
                }else{
                    echo "<script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'La cuenta de correo ya existe en el sistema, favor de validar!',
                    }).then((result) => {
                        if(result.value){
						    window.location = 'listarUsuarios';
                        }
                    });
                
                    </script>"; 
                }
               
            }
        }

    /******************************************************/
    //  FUNCIÓN PARA BORRAR LOS USUARIOS
    /******************************************************/


	static public function borrarUsuario(){

		if(isset($_GET["idUsuarioElimina"])){

            $tabla1 ="usuarios";
			$id = $_GET["idUsuarioElimina"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				//rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::borrarUsuario($tabla1, $id);

			if($respuesta == "ok"){

				echo"<script>

				
                            Swal.fire(
                                'OK!',
                                'El usuario ha sido borrado correctamente!',
                                'success'
                            ).then((result) => {
                                if(result.value){
                                
                                    window.location = 'listarUsuarios';
                                }
                            });

				</script>";

			}else{
                echo"<script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al borrar el usuario!',
                    });
                </script>";
            }	

		}

    }
    
    static public function mostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta =  ModeloUsuarios::MostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}
    
    }
?>