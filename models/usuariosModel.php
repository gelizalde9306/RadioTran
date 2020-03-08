<?php 

    require_once "conexion.php";

    class ModeloUsuarios{

       
        /*************************************************************************/
        // FUNCION DEL MODELO PARA MOSTRAR LOS USUARIOS DE LA BD
        /**************************************************************************/
        static public function MostrarUsuarios($tabla, $itemA, $valorA ){

            if($itemA != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $itemA = :correo");
                $stmt->bindParam("correo", $valorA,PDO::PARAM_STR) ;
                $stmt-> execute();
                return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt-> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        /*************************************************************************/
        // FUNCION DEL MODELO PARA REGISTRAR USUARIOS EN LA BD
        /**************************************************************************/
        static public function RegistrarUsuarios($tabla, $datos ){
            $stmt = Conexion::conectar()->prepare("INSERT INTO  $tabla(correo, contrasenia, foto, estatus, id_perfil)values(:correo, :contrasenia, :foto, :estatus, :perfil)");
            $stmt->bindParam("correo", $datos["correo"],PDO::PARAM_STR) ;
            $stmt->bindParam("contrasenia", $datos["contrasenia"],PDO::PARAM_STR) ;
            $stmt->bindParam("foto",$datos["foto"] ,PDO::PARAM_STR) ;
            $stmt->bindParam("estatus", $datos["estatus"] ,PDO::PARAM_STR) ;
            $stmt->bindParam("perfil", $datos["perfil"] ,PDO::PARAM_STR) ;
           
            if ($stmt-> execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt -> close();
            $stmt = null;
        }

        /*************************************************************************/
        // FUNCION DEL MODELO PARA EDITAR USUARIOS EN LA BD
        /**************************************************************************/
        static public function editarUsuario($tabla, $datos){
	
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  foto = :foto , apellidoPaterno = :apellidoPaterno , apellidoMaterno = :apellidoMaterno , telefono = :telefono WHERE correo = :correo");
    
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":apellidoPaterno", $datos["apellidoPaterno"], PDO::PARAM_STR);
            $stmt -> bindParam(":apellidoMaterno", $datos["apellidoMaterno"], PDO::PARAM_STR);
            $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
    
            if($stmt -> execute()){
    
                return "ok";
            
            }else{
    
                return "error";	
    
            }
    
            $stmt -> close();
    
            $stmt = null;
    
        }

         /*************************************************************************/
        // FUNCION DEL MODELO PARA ACTUALIZAR USUARIOS EN LA BD
        /**************************************************************************/

        static public function actualizarUsuario($tabla, $itemA, $valorA, $itemB, $valorB){
	
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $itemA = :itemA where  $itemB = :itemB");
    
            $stmt -> bindParam("itemA", $valorA, PDO::PARAM_STR);
            $stmt -> bindParam("itemB", $valorB, PDO::PARAM_STR);
     
     
    
            if($stmt -> execute()){
    
                return "ok";
            
            }else{
    
                return "error";	
    
            }
    
            $stmt -> close();
    
            $stmt = null;
    
        }
 /*************************************************************************/
        // FUNCION DEL MODELO PARA BORRAR USUARIOS EN LA BD
        /**************************************************************************/

	static public function borrarUsuario($tabla1, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE id_usuario  = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		           
        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";	
        }
        
        $stmt -> close();
        $stmt = null;


	}



    }
?>