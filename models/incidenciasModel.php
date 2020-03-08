<?php 

    require_once "conexion.php";

    class ModeloIncidencias{
        static public function mostrarCatalogoSistemas($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt-> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }


        static public function registrarIncidencia($tabla, $datos ){
            $stmt = Conexion::conectar()->prepare("INSERT INTO  $tabla(id_sistema, id_usuario, descripcion, estatus)values(:idSistema, :idUsuario, :descripcion, :estatus)");
            $stmt->bindParam("idSistema", $datos["idSistema"],PDO::PARAM_STR) ;
            $stmt->bindParam("idUsuario", $datos["idUsuario"],PDO::PARAM_STR) ;
            $stmt->bindParam("descripcion", $datos["descripcion"],PDO::PARAM_STR) ;
            $stmt->bindParam("estatus", $datos["estatus"],PDO::PARAM_STR) ;

            if ($stmt-> execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt -> close();
            $stmt = null;
        }

        static public function obtenerEstadisticas(){
        $stmt = Conexion::conectar()->prepare("SELECT a.id_sistema, (SELECT count(*) from incidencias b where b.id_sistema = a.id_sistema ) as total from catalogosistemas a");
        $stmt-> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
       }
    
    }
?>
