<?php

    class incidenciasController{

        static public function  mostrarCatalogoSistemas(){
            $tabla = 'catalogosistemas';
            $respuesta = ModeloIncidencias::mostrarCatalogoSistemas($tabla);
            return $respuesta;
        }


        static public function registrarIncidencia(){
            if(isset($_POST["idSistema"])){
                
                $tabla = 'incidencias';
                $idSistema = $_POST["idSistema"];
                $descripcion = $_POST["descripcion"];

                $datos = array(
                    "idUsuario" => $_SESSION["id"],
                    'estatus'=> 1,
                    'idSistema' => $idSistema,
                    'descripcion' => $descripcion
                );

                $respuesta = ModeloIncidencias::registrarIncidencia($tabla, $datos);

                if($respuesta == 'ok'){

                    echo "<script>

                    Swal.fire(
                        'OK!',
                        'Se registro correctamente la incidencia!',
                        'success'
                    ).then((result) => {
                        if(result.value){
                        
                            window.location = 'inicio';
                        }
                    });

                    </script>";

                 }else{
                    echo "<script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al registrar la incidencia!',
                    }).then((result) => {
                        if(result.value){
                            window.location = 'inicio';
                        }
                    });
                
                    </script>";

                }

            }
        }   
        
        
        static public function recuperaIncidencias(){
    
            $respuesta =  ModeloIncidencias::obtenerEstadisticas();
    
            return $respuesta;
        }

    }

    
?>