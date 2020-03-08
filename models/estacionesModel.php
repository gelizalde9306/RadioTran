<?php 

    require_once "conexion.php";

    class ModeloTransmisiones{

        /*********************************************************/
        // FUNCION DEL MODELO PARA INSERTAR TRANSMISIONES EN LA BD
        /*********************************************************/
        static public function registrarTransmision($tabla, $datos ){
            $stmt = Conexion::conectar()->prepare("INSERT INTO  $tabla(id_usuario, nombre, descripcion, url, horario, fecha_creacion, estatus)values(:idUsuario, :nombre, :descripcion, :url, :horario, :fechaCreacion,:estatus)");
            $stmt->bindParam("idUsuario", $datos["idUsuario"],PDO::PARAM_STR) ;
            $stmt->bindParam("nombre", $datos["nombre"],PDO::PARAM_STR) ;
            $stmt->bindParam("descripcion", $datos["descripcion"],PDO::PARAM_STR) ;
            $stmt->bindParam("url", $datos["url"],PDO::PARAM_STR) ;
            $stmt->bindParam("horario", $datos["horario"],PDO::PARAM_STR) ;
            $stmt->bindParam("fechaCreacion", $datos["fechaCreacion"],PDO::PARAM_STR) ;
            $stmt->bindParam("estatus", $datos["estatus"],PDO::PARAM_STR) ;
            

            if ($stmt-> execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt -> close();
            $stmt = null;
        }

        /*********************************************************/
        // FUNCION DEL MODELO PARA MOSTRAR TODAS LAS TRANSMISIONES EN LA BD
        /*********************************************************/

        static public function mostrarTransmisiones($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt-> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

         /*********************************************************/
        // FUNCION DEL MODELO PARA MOSTRAR TODAS LAS TRANSMISIONES POR Id
        /*********************************************************/
        

        static public function mostrarTransmisionesId($tabla,$id){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id_transmision = :id_transmision");
            $stmt->bindParam("id_transmision", $id,PDO::PARAM_STR) ; 
            $stmt-> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        /*************************************************************************/
        // FUNCION DEL MODELO PARA MOSTRAR TODAS LAS TRANSMISIONES CREADAS POR USUARIO EN LA BD
        /**************************************************************************/

        static public function mostrarTransmisionesPorUsuario($tabla,$item,$valor){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = $valor");
            $stmt-> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

        /*************************************************************************/
        // FUNCION DEL MODELO PARA BORRAR TRANSMISIONESPOR ID LA BD
        /**************************************************************************/

        static public function borrarTransmision($tabla1,$id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE id_transmision  = :id");
    
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